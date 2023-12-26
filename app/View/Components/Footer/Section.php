<?php

namespace App\View\Components\Footer;

use App\Models\Layout;
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
                ->select(['contact_section_title', 'contact_section_subtitle_text'])
                ->first(),
        ]);
    }
}
