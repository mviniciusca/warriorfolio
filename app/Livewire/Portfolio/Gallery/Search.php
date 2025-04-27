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
        // Verificar se já existe uma busca ativa ao montar o componente
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
        // Se o campo de busca estiver vazio, limpa a busca (mostra todos os projetos)
        if (empty($this->search)) {
            $this->searchActive = false;
            $this->dispatch('search-changed', search: '');

            return;
        }

        // Só dispara o evento de busca se tiver pelo menos 5 caracteres
        if (strlen($this->search) >= 5) {
            $this->searchActive = true;
            $this->dispatch('search-changed', search: $this->search);
        } else {
            $this->searchActive = false;
        }
    }

    public function submit()
    {
        // Se o campo estiver vazio, limpa a busca (mostra todos os projetos)
        if (empty($this->search)) {
            $this->searchActive = false;
            $this->dispatch('search-changed', search: '');

            return;
        }

        // Validação no submit também
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
