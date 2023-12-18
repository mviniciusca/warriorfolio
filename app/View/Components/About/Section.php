<?php

namespace App\View\Components\About;

use App\Models\Course;
use App\Models\Profile;
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
        return view('components.about.section', [
            'about' => Profile::first(),
            'courses' => Course::all()->sortDesc()->take(5),
        ]);
    }
}
