<?php

namespace App\View\Components\Newsletter;

use Closure;
use App\Models\Layout;
use App\Models\Module;
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
        return view('components.newsletter.section', [
            'module' => Module::query()
                ->select(['newsletter'])
                ->first(),
            'info' => Layout::query()
                ->select([
                    'newsletter_section_title',
                    'newsletter_section_subtitle_text',
                    'newsletter_section_button_text',
                    'newsletter_section_image',
                    'footer_section_fill'
                ])
                ->first(),
        ]);
    }
}
