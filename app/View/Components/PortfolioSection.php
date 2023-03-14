<?php

namespace App\View\Components;

use Closure;
use App\Models\Project;
use App\Models\PagesSettings;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class PortfolioSection extends Component
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
        return view('components.portfolio-section', [
            'projects' => Project::all()->sortByDesc('id')->take(12),
            'portfolio_title' => PagesSettings::first()->portfolio_title,
            'portfolio_description' => PagesSettings::first()->portfolio_description,
        ]);
    }
}
