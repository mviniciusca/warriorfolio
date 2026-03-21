<?php

namespace App\Models;

use App\Support\DicebearAvatar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class PageComment extends Model
{
    use HasFactory;

    public const STATUS_PENDING = 'pending';

    public const STATUS_APPROVED = 'approved';

    public const STATUS_REJECTED = 'rejected';

    protected $guarded = [];

    protected $casts = [
        'moderated_at' => 'datetime',
        'is_admin' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saving(function (PageComment $comment): void {
            if ($comment->isDirty('author_email')) {
                $comment->avatar_seed = static::makeAvatarSeed((string) $comment->author_email);
            }

            if (
                $comment->isDirty('status')
                && $comment->status === self::STATUS_APPROVED
                && $comment->getOriginal('status') !== self::STATUS_APPROVED
            ) {
                $comment->moderated_at = now();
                $comment->moderated_by = auth()->id();
            }
        });
    }

    public function page(): BelongsTo
    {
        return $this->belongsTo(Page::class);
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id')->orderBy('created_at');
    }

    public function moderator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'moderated_by');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_PENDING);
    }

    public function scopeApproved($query)
    {
        return $query->where('status', self::STATUS_APPROVED);
    }

    public function scopeForPage($query, int $pageId)
    {
        return $query->where('page_id', $pageId);
    }

    public static function makeAvatarSeed(string $email): string
    {
        return hash('sha256', strtolower(trim($email)));
    }

    public function getAvatarUrlAttribute(): string
    {
        return DicebearAvatar::url($this->avatar_seed);
    }

    /**
     * @return Collection<int, PageComment>
     */
    public static function approvedThreadForPage(int $pageId): Collection
    {
        $flat = static::query()
            ->where('page_id', $pageId)
            ->where('status', self::STATUS_APPROVED)
            ->orderBy('created_at')
            ->get();

        return static::nestComments($flat, null);
    }

    /**
     * @param  Collection<int, PageComment>  $flat
     * @return Collection<int, PageComment>
     */
    protected static function nestComments(Collection $flat, ?int $parentId): Collection
    {
        return $flat
            ->filter(fn (PageComment $c) => $c->parent_id === $parentId)
            ->values()
            ->map(function (PageComment $c) use ($flat) {
                $c->setRelation('thread_children', static::nestComments($flat, $c->id));

                return $c;
            });
    }
}
