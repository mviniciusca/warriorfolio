<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Page;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The "booted" method of the model.
     * Sync the is_active status between Post and Page models.
     */
    protected static function booted(): void
    {
        // Quando um post é criado, sincronizar com as páginas relacionadas
        static::created(function (Post $post) {
            $post->page()->update([
                'is_active' => $post->is_active,
            ]);
        });

        // Quando um post é atualizado, sincronizar com as páginas relacionadas
        static::updated(function (Post $post) {
            // Verifica se o campo is_active foi alterado
            if ($post->isDirty('is_active')) {
                // Atualiza todas as páginas relacionadas a este post
                $post->page()->update([
                    'is_active' => $post->is_active,
                ]);
            }
        });
    }

    /**
     * Get the category that the post belongs to.
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the pages associated with the post.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function page()
    {
        return $this->hasMany(Page::class);
    }

    /**
     * Get the user that owns the post.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
