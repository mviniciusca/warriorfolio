<?php

namespace App\View\Components\Themes\Juno;

use App\Models\Page;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Notes extends Component
{
    public function __construct()
    {
    }

    public function render(): View|Closure|string
    {
        return view('components.themes.juno.notes', [
            'posts' => Page::with(['post', 'post.category'])
                ->where('style', '=', 'blog')
                ->whereHas('post', function ($query) {
                    $query->where('is_active', '=', true);
                })
                ->where('is_active', '=', true)
                ->latest()
                ->take(6)
                ->get(),
        ]);
    }
}
