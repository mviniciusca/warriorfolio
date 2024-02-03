<?php

namespace App\View\Components\Hero;

use Closure;
use App\Models\Layout;
use App\Models\Module;
use App\Models\Slideshow;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

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
            'module' => Module::query()
                ->select(['hero'])
                ->first(),
            'info' => Layout::select([
                'hero_section_title',
                'hero_section_subtitle_text',
                'hero_section_button_text',
                'hero_section_button_url',
                'hero_alt_button_text',
                'hero_alt_button_url',
                'hero_section_image',
                'hero_button_link_target',
                'hero_alt_button_link_target',
                'hero_section_bg_image',
                'hero_section_bg_position',
                'hero_section_bg_size',
                'hero_section_bg_repeat',
                'hero_is_bg_visible',
            ])
                ->first(),
        ]);
    }
}
