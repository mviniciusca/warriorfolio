<?php

namespace App\Http\Livewire\Portfolio;

use App\Models\Project;
use Livewire\Component;
use App\Models\Project\Tag;

class Filter extends Component
{
    public Tag $tags;
    public $filter;

    /**
     * Mount app
     *
     * @param Tag $tags
     * @return void
     */
    public function mount(Tag $tags)
    {
        $this->tags = $tags;
        $this->filter = 'vercel';
    }

    /**
     * Render app
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.portfolio.filter',[
            'tags' => $this->tags->all(['id', 'title'])
        ]);
    }

    /**
     * Filter projects
     *
     * @param string $filter
     * @return void
     */
    public function filterProjects(string $filter)
    {
        $this->filter = $filter;
        $this->emit('filterProjects', $filter);
    }





}
