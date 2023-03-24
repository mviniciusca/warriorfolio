<?php

namespace App\View\Components\Hero;

use Closure;
use App\Models\HeroBackground;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Background extends Component
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
        return view('components.hero.background');
    }
}
