<?php

namespace App\View\Components\Project;

use App\Models\Layout;
use App\Models\Module;
use App\Models\Project;
use App\Traits\SectionLoader;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Section extends Component
{
    use SectionLoader;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->loadSection('portfolio');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.project.section', [
            'module' => Module::first(['portfolio']),

        ]);
    }
}
