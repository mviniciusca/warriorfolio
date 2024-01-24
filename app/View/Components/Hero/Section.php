<?php

namespace App\View\Components\Hero;

use Closure;
use App\Models\Layout;
use App\Models\Module;
use App\Models\Setting;
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
                'hero_alt_button_link_target'
            ])
                ->first(),
            'background' => Setting::query()
                ->select([
                    'background_image',
                    'background_image_visibility',
                    'background_image_position',
                    'background_image_size',
                    'background_image_repeat',
                ])
                ->first(),
        ]);
    }
}
