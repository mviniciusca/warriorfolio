<?php

namespace App\View\Components\Client;

use App\Models\Customer;
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
        return view('components.client.section', [
            'clients' => Customer::all(),
            'info' => Layout::query()
                ->select(['clients_section_text', 'clients_section_subtitle_text'])
                ->first(),
        ]);
    }
}
