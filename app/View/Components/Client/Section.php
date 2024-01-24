<?php

namespace App\View\Components\Client;

use Closure;
use App\Models\Layout;
use App\Models\Module;
use App\Models\Customer;
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
        return view('components.client.section', [
            'module' => Module::query()
                ->select(['clients'])
                ->first(),
            'clients' => Customer::all()
                ->take(12)
                ->sortDesc(),
            'info' => Layout::query()
                ->select([
                    'clients_section_fill',
                    'clients_section_title',
                    'clients_section_subtitle_text'
                ])
                ->first(),
        ]);
    }
}
