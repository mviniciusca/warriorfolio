<?php

namespace App\Livewire\Portfolio\Gallery;

use Livewire\Component;

class Search extends Component
{
    public $search = '';

    public $searchActive = false;

    protected $listeners = [
        'search-initialized' => 'handleSearchInitialized',
    ];

    public function mount()
    {
        // Check if there's already an active search when mounting the component
        if (! empty($this->search) && strlen($this->search) >= 5) {
            $this->searchActive = true;
        }
    }

    public function handleSearchInitialized($search)
    {
        $this->search = $search;
        $this->searchActive = strlen($search) >= 5;
    }

    public function updatedSearch()
    {
        // If search field is empty, clear the search (show all projects)
        if (empty($this->search)) {
            $this->searchActive = false;
            $this->dispatch('search-changed', search: '');

            return;
        }

        // Only trigger search event if there are at least 5 characters
        if (strlen($this->search) >= 5) {
            $this->searchActive = true;
            $this->dispatch('search-changed', search: $this->search);
        } else {
            $this->searchActive = false;
        }
    }

    public function submit()
    {
        // If field is empty, clear the search (show all projects)
        if (empty($this->search)) {
            $this->searchActive = false;
            $this->dispatch('search-changed', search: '');

            return;
        }

        // Validation on submit as well
        if (strlen($this->search) >= 5) {
            $this->searchActive = true;
            $this->dispatch('search-changed', search: $this->search);
        }
    }

    public function clearSearch()
    {
        $this->search = '';
        $this->searchActive = false;
        $this->dispatch('search-changed', search: '');
    }

    public function render()
    {
        return view('livewire.portfolio.gallery.search');
    }
}
