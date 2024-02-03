<?php

namespace App\View\Components\Hero;

use App\Models\Slideshow;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Maatwebsite\Excel\Concerns\ToArray;

class Slider extends Component
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
        return view('components.hero.slider', [
            //
        ]);
    }
}
