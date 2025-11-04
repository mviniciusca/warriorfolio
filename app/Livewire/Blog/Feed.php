<?php

namespace App\Livewire\Blog;

use App\Models\Category;
use App\Models\Page;
use Livewire\Component;
use Livewire\WithPagination;

class Feed extends Component
{
    use WithPagination;

    public $category;

    public function mount(): void
    {
        $this->category = null;
    }

    public function setCategory($categoryId): void
    {
        $this->category = $categoryId;
        $this->resetPage();
    }

    public function getDataProperty()
    {
        $query = Page::where('is_active', true)
            ->where('style', 'blog')
            ->with('user', 'post');

        if (! is_null($this->category)) {
            $query->whereHas('post', function ($query) {
                $query
                    ->where('category_id', $this->category);
            });
        }

        return $query->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    public function getActivePostsCount()
    {
        return Page::where('is_active', true)
            ->with('category')
            ->where('style', 'blog')
            ->whereHas('post', function ($query) {
                $query->where('is_active', true);
            })
            ->count();
    }

    public function render()
    {
        return view('livewire.blog.feed', [
            'data'             => $this->data,
            'activePostsCount' => $this->getActivePostsCount(),
            'categories'       => Category::where('is_active', true)
                ->whereHas('post', function ($query) {
                    $query->where('is_active', true)
                        ->whereHas('page', function ($query) {
                            $query->where('is_active', true);
                        });
                })
                ->where('is_blog', true)
                ->get(),

        ]);
    }
}
