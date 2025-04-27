<?php

namespace App\Livewire\Portfolio\Gallery;

use App\Models\Page;
use Livewire\Component;
use Livewire\WithPagination;

class Grid extends Component
{
    use WithPagination;

    public $orderBy = 'created_at';

    public $orderDirection = 'desc';

    public $activeCategory = null;

    protected $listeners = [
        'category-changed' => 'handleCategoryChange',
        'sort-changed'     => 'handleSortChange',
    ];

    public function handleSortChange($sort)
    {
        $this->orderBy = $sort['orderBy'];
        $this->orderDirection = $sort['orderDirection'];
        $this->resetPage();
    }

    public function handleCategoryChange($categoryId)
    {
        $this->activeCategory = $categoryId;
        $this->resetPage();
    }

    public function setOrderBy($field)
    {
        if ($this->orderBy === $field) {
            $this->orderDirection = $this->orderDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->orderBy = $field;
            $this->orderDirection = 'asc';
        }
        $this->resetPage();
    }

    public function render()
    {
        $query = Page::where('is_active', true)
            ->where('style', 'project')
            ->with(['project' => function ($query) {
                $query->where('is_active', true);
            }, 'project.category']);

        if ($this->activeCategory !== null) {
            $query->whereHas('project', function ($query) {
                $query->where('category_id', $this->activeCategory);
            });
        }

        $data = $query->orderBy($this->orderBy, $this->orderDirection)
            ->paginate(12);

        return view('livewire.portfolio.gallery.grid', [
            'data' => $data,
        ]);
    }
}
