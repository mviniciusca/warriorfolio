<?php

namespace App\Livewire\Portfolio\Gallery;

use Livewire\Component;

class Controls extends Component
{
    public $orderBy = 'created_at';

    public $orderDirection = 'desc';

    public $viewMode = 'normal';

    public function mount()
    {
        $this->viewMode = session('portfolioViewMode', 'normal');
    }

    public function setOrderBy($field)
    {
        if ($this->orderBy === $field) {
            $this->orderDirection = $this->orderDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->orderDirection = 'desc';
            $this->orderBy = $field;
        }

        $this->dispatch('sort-changed', [
            'orderBy'        => $this->orderBy,
            'orderDirection' => $this->orderDirection,
        ]);
    }

    public function toggleOrderBy()
    {
        $this->orderBy = $this->orderBy === 'created_at' ? 'title' : 'created_at';

        $this->dispatch('sort-changed', [
            'orderBy'        => $this->orderBy,
            'orderDirection' => $this->orderDirection,
        ]);
    }

    public function toggleOrderDirection()
    {
        $this->orderDirection = $this->orderDirection === 'asc' ? 'desc' : 'asc';

        $this->dispatch('sort-changed', [
            'orderBy'        => $this->orderBy,
            'orderDirection' => $this->orderDirection,
        ]);
    }

    public function cycleViewMode()
    {
        if ($this->viewMode === 'normal') {
            $this->viewMode = 'large';
        } elseif ($this->viewMode === 'large') {
            $this->viewMode = 'compact';
        } else {
            $this->viewMode = 'normal';
        }

        session(['portfolioViewMode' => $this->viewMode]);
        $this->dispatch('view-mode-changed', ['viewMode' => $this->viewMode]);
    }

    public function resetControls()
    {
        $this->orderBy = 'created_at';
        $this->orderDirection = 'desc';
        $this->viewMode = 'normal';
        session(['portfolioViewMode' => 'normal']);

        $this->dispatch('search-changed', search: '');
    }

    public function render()
    {
        return view('livewire.portfolio.gallery.controls');
    }
}
