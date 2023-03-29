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
            'count'     => $this->projectsCount,
            'tagTitle' => $this->getTagTitleProperty(),
            'tagColor' => $this->getTagColorProperty(),
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

    // count result of filter
    public function getProjectsCountProperty()
    {
        return $this->projects->count();
    }

    //get the title of active filter
    public function getTagTitleProperty()
    {
        if ($this->filter === 'all') {
            return 'All';
        }

        return $this->tag->where('title', $this->filter)->first()->title;
    }

    // get the tag color of active filter
    public function getTagColorProperty()
    {
        if ($this->filter === 'all') {
            return 'gray';
        }

        return $this->tag->where('title', $this->filter)->first()->color;
    }
}
