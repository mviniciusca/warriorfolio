<?php

namespace App\Livewire\Portfolio\Gallery;

use App\Models\Category;
use App\Models\Page;
use Livewire\Attributes\Url;
use Livewire\Component;

class Categories extends Component
{
    #[Url]
    public $activeCategory = null;

    protected $queryString = [
        'activeCategory' => ['except' => null],
    ];

    public function mount()
    {
        // Se a categoria estiver na URL, definimos ela como ativa
        if (request()->has('activeCategory')) {
            $this->activeCategory = request()->get('activeCategory');
            // Despachamos o evento para informar outros componentes
            $this->dispatch('category-changed', categoryId: $this->activeCategory);
        }
    }

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
        $this->activeCategory = null;
        $this->dispatch('category-changed', categoryId: null);
    }

    public function filterCategory($categoryId)
    {
        $this->activeCategory = $categoryId;
        $this->dispatch('category-changed', categoryId: $categoryId);
    }
}
