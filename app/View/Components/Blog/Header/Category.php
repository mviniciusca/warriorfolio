<?php

namespace App\View\Components\Blog\Header;

use App\Models\Category as BlogCategory;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Category extends Component
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
        return view('components.blog.header.category', [
            'data' => BlogCategory::where('is_active', '=', true)
                ->get(),
        ]);
    }
}
