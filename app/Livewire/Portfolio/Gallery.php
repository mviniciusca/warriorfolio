<?php

namespace App\Livewire\Portfolio;

use App\Models\Category;
use App\Models\Layout;
use App\Models\Page;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;

class Gallery extends Component
{
    use WithPagination;

    public $category_id = 0;

    public $is_section_filled_inverted = '';

    public $orderBy = 'created_at';

    public $orderDirection = 'desc';

    protected $queryString = [
        'category_id'    => ['except' => 0],
        'orderBy'        => ['except' => 'created_at'],
        'orderDirection' => ['except' => 'desc'],
    ];

    public function setOrderBy($field)
    {
        // Se clicar no mesmo campo que já está selecionado, inverte a direção
        if ($this->orderBy === $field) {
            $this->orderDirection = $this->orderDirection === 'asc' ? 'desc' : 'asc';
        } else {
            // Se mudar o campo, reseta para desc e atualiza o campo
            $this->orderDirection = 'desc';
            $this->orderBy = $field;
        }
    }

    public function getCategories()
    {
        $categories = Category::where('is_active', '=', true)
            ->whereHas('project', function ($query) {
                $query->where('is_active', '=', true);
            })
            ->withCount(['project' => function ($query) {
                $query->where('is_active', '=', true);
            }])
            ->latest()
            ->get();

        $totalProjects = Page::where('style', '=', 'project')
            ->whereHas('project', function ($query) {
                $query->where('is_active', '=', true);
            })
            ->where('is_active', '=', true)
            ->count();

        return [
            'categories'    => $categories,
            'totalProjects' => $totalProjects,
        ];
    }

    public function render()
    {
        $categoriesData = $this->getCategories();

        return view('livewire.portfolio.gallery', [
            'data'          => $this->getProjects(),
            'categories'    => $categoriesData['categories'],
            'totalProjects' => $categoriesData['totalProjects'],
        ]);
    }

    public function getProjects()
    {
        $query = Page::with('project')
            ->where('style', '=', 'project')
            ->whereHas('project', function ($query) {
                $query->where('is_active', '=', true);
            })
            ->where('is_active', '=', true);

        if ($this->category_id) {
            $query->whereHas('project', function ($query) {
                $query->whereHas('category', function ($query) {
                    $query->where('id', '=', $this->category_id);
                });
            });
        }

        return $query->orderBy($this->orderBy, $this->orderDirection)
            ->paginate($this->accessCache() ?? 12);
    }

    public function filterCategoryById($category_id): void
    {
        $this->category_id = $category_id;
        $this->resetPage();
    }

    public function clear(): void
    {
        $this->category_id = 0;
        $this->orderBy = 'created_at';
        $this->orderDirection = 'desc';
        $this->resetPage();
    }

    public function accessCache(): mixed
    {
        return 9;
    }
}
