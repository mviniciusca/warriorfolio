<?php

namespace App\Livewire\Portfolio;

use App\Models\Category;
use App\Models\Page;
use App\Models\Project;
use Livewire\Component;

class Gallery extends Component
{
    public $category_id = 0;

    public $quantity = 12;

    public $is_section_filled_inverted = '';

    protected $listeners = [
        'filterCategoryById' => 'filterCategoryById',
        'clear'              => 'clear',
    ];

    public function render()
    {
        return view('livewire.portfolio.gallery', [
            'data'       => $this->getProjects(),
            'categories' => $this->getCategories(),
        ]);
    }

    public function getProjects()
    {
        if ($category_id = $this->category_id) {
            return Page::with('project')
                ->where('style', '=', 'project')
                ->whereHas('project', function ($query) use ($category_id) {
                    $query->whereHas('category', function ($query) use ($category_id) {
                        $query->where('id', '=', $category_id);
                    })->where('is_active', '=', true);
                })
                ->where('is_active', '=', true)
                ->latest()
                ->take($this->quantity ?? 12)
                ->get();
        }

        return Page::with('project')
            ->where('style', '=', 'project')
            ->whereHas('project', function ($query) {
                $query->where('is_active', '=', true);
            })
            ->where('is_active', '=', true)
            ->latest()
            ->take($this->quantity ?? 12)
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

    /**
     * Get the value of category_id
     * @param mixed $category_id
     * @return mixed
     */
    public function filterCategoryById($category_id): mixed
    {
        return $this->category_id = $category_id;
    }

    /**
     * Summary of clear
     * @return void
     */
    public function clear(): void
    {
        $this->category_id = 0;
    }
}
