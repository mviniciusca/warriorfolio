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
        $this->resetPage(); // Reseta a página para 1 ao mudar a categoria
    }

    public function getDataProperty()
    {
        $query = Page::where('is_active', true)
            ->where('style', 'blog');

        if (! is_null($this->category)) {
            $query->where('category_id', $this->category);
        }

        return $query->orderByDesc('created_at')->paginate(5); // Exibir 5 por página
    }

    public function render()
    {
        return view('livewire.blog.feed', [
            'data'       => $this->data, // Usa a propriedade computada com paginação
            'categories' => Category::where('is_active', true)->get(),
        ]);
    }
}
