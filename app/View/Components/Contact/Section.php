<?php

namespace App\View\Components\Contact;

use App\Models\Layout;
use App\Models\Module;
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
        return view('components.contact.section', [
            'module' => Module::query()
                ->select(['contact'])
                ->first(),
            'info' => Layout::query()
                ->select([
                    'contact_section_fill',
                    'contact_section_title',
                    'contact_section_subtitle_text',
                    'contact_section_address',
                    'contact_section_email',
                    'contact_section_google_map',
                    'contact_section_google_map',
                    'contact_section_phone'
                ])
                ->first(),
        ]);
    }
}
