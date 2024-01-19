<?php

namespace App\Livewire;

use App\Models\Project;
use Livewire\Component;

class Gallery extends Component
{
    public int $projectId = '';
    public function render()
    {
        return view('livewire.gallery', [
            'projects' => Project::all(),
            'project' => $this->projectId ? Project::find($this->projectId) : ''
        ]);
    }

    public function showGallery($id)
    {
        $this->projectId = $id;
    }
}
