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

    public $search = '';

    protected $queryString = [
        'search'         => ['except' => ''],
        'page'           => ['except' => 1],
        'activeCategory' => ['except' => null],
    ];

    protected $listeners = [
        'category-changed' => 'handleCategoryChange',
        'sort-changed'     => 'handleSortChange',
        'search-changed'   => 'handleSearch',
        'controls-reset'   => 'handleReset',
    ];

    public function mount()
    {
        if (request()->has('search')) {
            $this->search = request()->get('search');
            $this->dispatch('search-initialized', search: $this->search);
        }

        // Sincronizar com a categoria da URL se estiver disponível
        if (request()->has('activeCategory')) {
            $this->activeCategory = request()->get('activeCategory');
        }
    }

    public function handleReset()
    {
        $this->search = '';
        $this->resetPage();
    }

    public function handleSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

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

        if (! empty($this->search)) {
            $searchTerm = '%'.$this->search.'%';
            $query->where(function ($query) use ($searchTerm) {
                $query->where('title', 'like', $searchTerm)
                    ->orWhereHas('project', function ($query) use ($searchTerm) {
                        $query->where('short_description', 'like', $searchTerm)
                            ->orWhereHas('category', function ($query) use ($searchTerm) {
                                $query->where('name', 'like', $searchTerm);
                            });
                    });
            });
        }

        $data = $query->orderBy($this->orderBy, $this->orderDirection)
            ->paginate(12);

        return view('livewire.portfolio.gallery.grid', [
            'data' => $data,
        ]);
    }
}
