<?php

namespace App\Livewire\Portfolio;

use App\Livewire\Blog\Feed\Categories;
use App\Models\Category;
use Livewire\Component;

class Navigation extends Component
{
    public $category_id = 0;

    public $is_section_filled_inverted = '';

    protected $listeners = [
        'filterCategoryById' => 'filterCategoryById',
        'clear'              => 'clear',
    ];

    public function render()
    {
        return view('livewire.portfolio.navigation', [
            'categories' => $this->getCategories(),
        ]);
    }

    public function getCategories()
    {
        return Category::where('is_active', '=', true)
            ->whereHas('project', function ($query) {
                $query->where('is_active', '=', true);
            })
            ->latest()
            ->get();
    }

    public function filterCategoryById($category_id)
    {
        return $this->category_id = $category_id;
    }
}
