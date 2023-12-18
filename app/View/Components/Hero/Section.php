<?php

namespace App\View\Components\Hero;

use App\Models\Layout;
use App\Models\Setting;
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
            'hero' => Layout::select(['hero_section_title', 'hero_section_subtitle_text'])
                ->first(),
            'background' => Setting::select(['background_image'])
                ->first(),
        ]);
    }
}
