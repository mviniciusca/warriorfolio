<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;
use App\Models\Project\Tag;

class Portfolio extends Component
{
    public Project $project;
    public Tag $tag;

    public $filter;

    public function mount(Project $project, Tag $tag)
    {
        $this->filter   = 'all';
        $this->project  = $project;
        $this->tag      = $tag;
    }

    public function render()
    {
        return view('livewire.portfolio', [
            'filters'   => Tag::all('id', 'title'),
            'projects'  => $this->projects->sortByDesc('created_at')->take(12),
        ]);
    }

    public function filter($filter)
    {
        $this->filter = $filter;
    }

    public function getProjectsProperty()
    {
        if ($this->filter === 'all') {
            return $this->project->all();
        }

        return $this->project->whereHas('tag', function ($query) {
            $query->where('title', $this->filter);
        })->get();
    }
}
