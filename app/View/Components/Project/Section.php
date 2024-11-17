<?php

namespace App\View\Components\Project;

use App\Models\Layout;
use App\Models\Module;
use App\Models\Project;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Section extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.project.section', [
            'module' => Module::query()
                ->first(['portfolio']),
            'data'     => Layout::first(['portfolio']),
            'projects' => Project::query()
                ->where('is_active', true)
                ->orderBy('created_at', 'desc')
                ->take(12)
                ->get(),
        ]);
    }
}
