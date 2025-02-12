<?php

namespace App\Livewire\Blog\Feed;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{
    public $category;

    public function render()
    {
        return view('livewire.blog.feed.categories', [
            'data' => Category::where('is_active', '=', true)
                ->get(),
        ]);
    }

    public function mount()
    {
        $this->category;
    }

    public function category()
    {
        $this->dispatch('category-passed', title: $this->category);
    }
}
