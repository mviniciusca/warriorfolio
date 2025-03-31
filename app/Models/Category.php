<?php

namespace App\Models;

use App\Models\Page;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Category
 *
 * Represents a category in the system, which can have projects, pages, and a parent category.
 */
class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Get all of the projects for the Category.
     *
     * @return HasMany
     */
    public function project(): HasMany
    {
        return $this->hasMany(Project::class);
    }

    /**
     * Get the parent category that owns the Category.
     *
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
     * Get all of the pages associated with the Category.
     *
     * @return HasMany
     */
    public function pages(): HasMany
    {
        return $this->hasMany(Page::class, 'category_id');
    }

    /**
     * Get all of the posts associated with the Category.
     *
     * @return HasMany
     */
    public function post(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
