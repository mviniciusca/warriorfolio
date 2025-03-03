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

    /**
     * Connects to Page and check the Category from the Post
     * @return array
     */
    public function getData(): array
    {
        return Category::withCount(['post' => function ($query) {
            $query->whereHas('page');
        }])
            ->where('is_active', true)
            ->limit(10)
            ->orderByDesc('post_count')
            ->get()
            ->filter(function (Category $category) {
                return $category->post_count > 0;
            })
            ->map(function (Category $category): array {
                return [
                    'label' => $category->name,
                    'count' => $this->counterGuide($category->post_count),
                ];
            })
            ->toArray();
    }

    /**
     * Get the total of posts and return the value
     * @param int $counter
     * @return int|string
     */
    public function counterGuide(int $counter): int|string
    {
        return $counter <= 99 ? $counter : '+99';
    }
}
