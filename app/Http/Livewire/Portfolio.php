<?php

namespace App\Http\Livewire;

use App\Models\Project;
use Livewire\Component;

class Portfolio extends Component
{

    public Project $project;

    public function mount(Project $project)
    {
        $this->project = $project;
    }

    public function render()
    {
        return view('livewire.portfolio', [
            'projects' => $this->getProjectsWithTags(),
        ]);
    }

    public function getProjectsWithTags()
    {
        return Project::with('tag')->get()->sortByDesc('id');
    }
}
