<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Project extends Model
{
    use HasFactory;

    protected $casts = [
        'tags' => 'array',
    ];

    protected $guarded = [];

    /**
     * Get the category associated with the project.
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Retrieve all published (active) projects.
     *
     * @return Collection|array
     */
    public static function published(): array|Collection
    {
        return static::where('is_active', true)->get();
    }

    /**
     * Retrieve chart data for active projects grouped by month.
     *
     * @return array
     */
    public static function chartData(): array
    {
        return static::selectRaw('count(*) as count, monthname(created_at) as month')
            ->where('is_active', true)
            ->groupBy('month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }

    public function page(): HasMany
    {
        return $this->hasMany(Page::class);
    }
}
