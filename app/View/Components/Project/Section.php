<?php

namespace App\View\Components\Project;

use Closure;
use App\Models\Layout;
use App\Models\Module;
use App\Models\Project;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

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
                ->select(['portfolio'])
                ->first(),
            'info' => Layout::query()
                ->select([
                    'portfolio_section_fill',
                    'portfolio_section_title',
                    'portfolio_section_subtitle_text',
                ])
                ->first(),
            'projects' => Project::query()
                ->where('is_active', true)
                ->orderBy('created_at', 'desc')
                ->take(12)
                ->get(),
        ]);
    }
}
