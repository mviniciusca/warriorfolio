<?php

namespace App\View\Components\Themes\Juno;

use App\Models\Page;
use App\Traits\SectionLoader;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Projects extends Component
{
    use SectionLoader;

    public function __construct()
    {
        $this->loadSection('portfolio');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.themes.juno.projects', [
            'data' => Page::with('project')
                ->where('style', '=', 'project')
                ->whereHas('project', function ($query) {
                    $query->where('is_active', '=', true);
                })
                ->where('is_active', '=', true)
                ->latest()
                ->take(12)
                ->get(),

        ]);
    }
}
