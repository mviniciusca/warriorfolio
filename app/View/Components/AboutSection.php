<?php

namespace App\View\Components;

use Closure;
use App\Models\Profile;
use App\Models\Timeline;
use App\Models\PagesSettings;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

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
            'profile' => Profile::first(),
            'about_title' => PagesSettings::first()->about_title,
            'about_description' => PagesSettings::first()->about_description,
        ]);
    }
}
