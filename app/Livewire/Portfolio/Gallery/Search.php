<?php

namespace App\Livewire\Portfolio\Gallery;

use Livewire\Component;

class Search extends Component
{
    public $search = '';

    protected $listeners = [
        'search-initialized' => 'handleSearchInitialized',
    ];

    public function handleSearchInitialized($search)
    {
        $this->search = $search;
    }

    public function updated($field)
    {
        if ($field === 'search') {
            $this->dispatch('search-changed', search: $this->search);
        }
    }

    public function submit()
    {
        $this->dispatch('search-changed', search: $this->search);
    }

    public function render()
    {
        return view('livewire.portfolio.gallery.search');
    }
}
