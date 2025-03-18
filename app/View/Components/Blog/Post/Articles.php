<?php

namespace App\View\Components\Blog\Post;

use App\Models\Page;
use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Articles extends Component
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
        return view('components.blog.post.articles',
            ['articles' => Page::all()
                ->where('is_active', '=', true)
                ->sortByDesc('created_at')
                ->take(5),
                'setting' => Setting::first('blog')->blog,
            ]);
    }
}
