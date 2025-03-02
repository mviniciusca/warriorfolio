<?php

namespace App\View\Components\Blog\Widget;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Counter extends Component
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
        return view('components.blog.widget.counter', [
            'data' => $this->getData(),
        ]);
    }

    public function getData()
    {
        return Category::withCount('post')->get()->map(function ($category) {
            return [
                'label' => $category->name,
                'count' => $category->count(),
            ];
        })->toArray();
    }
}
