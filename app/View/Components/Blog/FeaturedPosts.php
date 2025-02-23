<?php

namespace App\View\Components\Blog;

use App\Models\Page;
use App\Models\Post;
use App\Models\Setting;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeaturedPosts extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blog.featured-posts', [
            'info'  => Setting::first('blog')->blog,
            'posts' => Post::with('category')
                ->with('user')
                ->with('page')
                ->where('is_active', '=', true)
                ->limit(2)
                ->orderByDesc('created_at')
                ->get(),
        ]);
    }
}
