<?php

namespace App\View\Components\Blog;

use App\Models\Page;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Homepage extends Component
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
        return view('components.blog.homepage', [
            'data' => Page::query()
                ->where('style', '=', 'blog')
                ->where('is_active', '=', true)
                ->with('category')
                ->orderByDesc('created_at')
                ->simplePaginate(10),
        ]);
    }
}
