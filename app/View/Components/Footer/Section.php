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
            'info' => Layout::query()
                ->select([
                    'newsletter_section_title',
                    'newsletter_section_subtitle_text',
                    'newsletter_section_button_text',
                    'newsletter_section_image',
                    'footer_section_fill',
                ])
                ->first(),
            'setting' => Setting::query()
                ->select(['design', 'application'])
                ->first(),
            'module' => Module::query()
                ->select(['newsletter', 'footer'])
                ->first(),
        ]);
    }
}
