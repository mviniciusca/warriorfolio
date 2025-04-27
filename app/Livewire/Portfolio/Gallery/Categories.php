<?php

namespace App\Livewire\Portfolio\Gallery;

use App\Models\Category;
use App\Models\Page;
use Livewire\Component;

class Categories extends Component
{
    public function render()
    {
        return view('livewire.portfolio.gallery.categories', [
            'categories' => Category::where('is_active', true)
                ->where('is_project', true)
                ->whereHas('project', function ($query) {
                    $query->whereHas('page', function ($query) {
                        $query->where('is_active', true)
                            ->where('style', 'project');
                    });
                })
                ->withCount(['project' => function ($query) {
                    $query->whereHas('page', function ($query) {
                        $query->where('is_active', true)
                            ->where('style', 'project');
                    });
                }])
                ->get(),
            'totalProjects' => Page::where('is_active', true)
                ->where('style', 'project')
                ->whereHas('project', function ($query) {
                    $query->where('is_active', true);
                })
                ->count(),
        ]);
    }

    public function resetCategory()
    {
        $this->dispatch('category-changed', categoryId: null);
    }

    public function filterCategory($categoryId)
    {
        $this->dispatch('category-changed', categoryId: $categoryId);
    }
}
