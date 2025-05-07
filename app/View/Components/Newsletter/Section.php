<?php

namespace App\View\Components\Newsletter;

use App\Traits\SectionLoader;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Section extends Component
{
    /**
     * Create a new component instance.
     */
    use SectionLoader;

    public function __construct()
    {
        $this->loadSection('newsletter');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.newsletter.section', [
            'section' => $this->section,
        ]);
    }
}
