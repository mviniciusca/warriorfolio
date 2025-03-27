<?php

namespace App\View\Components\Hero;

use App\Models\Layout;
use App\Models\Module;
use App\Models\Setting;
use App\Models\Slideshow;
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
        return view('components.hero.section', [
            'sliders' => getSlider('hero-section', new Slideshow),
            // 'module'  => Module::first(['hero']),
            // 'hero'    => Layout::first(['hero']),
            'data' => Setting::with(['layout', 'module', 'user'])->first(),
        ]);
    }
}
