<?php

namespace App\Livewire\Portfolio;

use App\Models\Category;
use App\Models\Layout;
use App\Models\Page;
use App\Models\Project;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Gallery extends Component
{
    public $category_id = 0;

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

    /**
     * Get Projects from the database
     * @return \Illuminate\Database\Eloquent\Collection<int, Page>
     */
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
                ->take($this->accessCache())
                ->get();
        }

        return Page::with('project')
            ->where('style', '=', 'project')
            ->whereHas('project', function ($query) {
                $query->where('is_active', '=', true);
            })
            ->where('is_active', '=', true)
            ->latest()
            ->take($this->accessCache())
            ->get();
    }

    /**
     * Get categories from the database
     * @return mixed
     */
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
     * Get the value of category_id and filter by it
     * @param mixed $category_id
     * @return mixed
     */
    public function filterCategoryById($category_id): mixed
    {
        return $this->category_id = $category_id;
    }

    /**
     * Clear the filter
     * @return void
     */
    public function clear(): void
    {
        $this->category_id = 0;
    }

    /**
     * Access the cache for the portfolio quantity
     * @return mixed
     */
    public function accessCache(): mixed
    {
        return Cache::remember('portfolio_quantity', 3600, function () {
            $layout = Layout::first(['portfolio']);

            $layout->portfolio['quantity'] ?? 12;
        });
    }
}
