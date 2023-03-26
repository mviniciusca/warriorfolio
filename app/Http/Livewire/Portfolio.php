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
        return view('livewire.portfolio',[
            'projects' => Project::all()->sortByDesc('id'),
        ]);
    }





}
