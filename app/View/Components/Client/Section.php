<?php

namespace App\View\Components\Client;

use App\Models\Customer;
use App\Models\Layout;
use App\Models\Module;
use App\Models\Slideshow;
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
            'sliders'   => getSlider('clients-section', new Slideshow),
            'module'    => Module::first(['clients']),
            'customers' => Customer::orderBy('created_at', 'desc')
                ->take(12)
                ->get(),
            'data' => Layout::first(['customer']),
        ]);
    }
}
