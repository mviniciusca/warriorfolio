<?php

namespace App\View\Components;

use App\Models\Profile;
use App\Models\Timeline;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AboutSection extends Component
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
        return view('components.about-section', [
            'courses' => Timeline::all()->sortByDesc('id')->take(5),
            'about' => Profile::all()->sortByDesc('id')->take(1),
        ]);
    }
}
