<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Post;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends \Z3d0X\FilamentFabricator\Models\Page
{
    protected $casts = [
        'seo'    => 'array',
        'blocks' => 'array',
    ];

    /**
     * Get the category that the page belongs to.
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the post that the page belongs to.
     *
     * @return BelongsTo
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Get the project that the page belongs to.
     *
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the user that owns the page.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The "booted" method of the model.
     * Deletes the associated post when the page is deleted.
     *
     * @return void
     */
    protected static function booted(): void
    {
        static::deleted(function ($page) {
            if ($page->post) {
                $page->post->delete();
            }
            if ($page->project) {
                $page->project->delete();
            }
        });
    }
}
