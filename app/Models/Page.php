<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends \Z3d0X\FilamentFabricator\Models\Page
{
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted()
    {
        static::deleted(function ($page) {
            if ($page->post) {
                $page->post->delete();
            }
        });
    }
}
