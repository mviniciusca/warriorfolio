<?php

namespace App\Livewire\Portfolio;

use App\Models\Category;
use App\Models\Project;
use Livewire\Component;

class Gallery extends Component
{
    public $category_id = 0;

    public function render()
    {
        return view('livewire.portfolio.gallery', [
            'projects'   => $this->getProjects(),
            'categories' => $this->getCategories(),
        ]);
    }

    public function getProjects()
    {
        if ($category_id = $this->category_id) {
            return Project::with('category')
                ->where('is_active', '=', true)
                ->where('category_id', '=', $category_id)
                ->latest()
                ->get();
        }

        return Project::with('category')
            ->where('is_active', '=', true)
            ->latest()
            ->get();
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

    public function clear()
    {
        $this->category_id = 0;
    }
}
