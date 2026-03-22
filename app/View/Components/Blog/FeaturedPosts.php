<?php

namespace App\View\Components\Blog;

use App\Models\Module;
use App\Models\Page;
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
        $blogRow = Setting::query()->first();
        $blogConfig = is_array($blogRow?->blog ?? null) ? $blogRow->blog : [];
        $limit = Setting::moduleBlogPostsLimit($blogConfig);

        return view('components.blog.featured-posts', [
            'module_blog' => (bool) (Module::query()->value('blog') ?? false),
            'info' => $blogConfig,
            'posts' => Page::with(['post', 'user'])
                ->where('is_active', '=', true)
                ->where('style', '=', 'blog')
                ->orderByDesc('created_at')
                ->limit($limit)
                ->get(),
        ]);
    }
}
