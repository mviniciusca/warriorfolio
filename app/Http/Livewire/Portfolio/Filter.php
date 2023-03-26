<?php

namespace App\Http\Livewire\Portfolio;

use App\Models\Project;
use Livewire\Component;

class Filter extends Component
{

    public $filter = 'all';

    public Project $project;

    public function mount(Project $project)
    {
        $this->project = $project;
    }

    public function render()
    {
        return view('livewire.portfolio.filter', [
           // return filter projects
              'projects' => $this->projects,
        ]);
    }

    public function filter($filter)
    {
        $this->filter = $filter;
    }

    public function getProjectsProperty()
    {
        if ($this->filter === 'all') {
            return $this->project->all()->sortByDesc('id');
        }
        return $this->project->where('tag', $this->filter)->get();
    }
}
