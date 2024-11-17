<?php

namespace App\View\Components\Footer;

use App\Models\Layout;
use App\Models\Module;
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
        return view('components.footer.section', [
            'info' => Layout::first([
                'newsletter_section_title',
                'newsletter_section_subtitle_text',
                'newsletter_section_button_text',
                'newsletter_section_image',
                'footer_section_fill',
            ]),
            'setting' => Setting::first([
                'design',
                'application',
            ]),
            'module' => Module::first([
                'newsletter',
                'footer',
            ]),
        ]);
    }
}
