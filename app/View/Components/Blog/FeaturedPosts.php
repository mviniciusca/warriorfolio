<?php

namespace App\View\Components\Blog;

use App\Models\Page;
use App\Models\Post;
use App\Models\Setting;
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
            'posts' => Page::with('post')
                ->with('user')
                ->where('is_active', '=', true)
                ->where('style', '=', 'blog')
                ->limit(2)
                ->orderByDesc('created_at')
                ->get(),
        ]);
    }
}
