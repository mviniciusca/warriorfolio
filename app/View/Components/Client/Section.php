<?php

namespace App\View\Components\Client;

use App\Models\Customer;
use App\Models\Setting;
use App\Models\Slideshow;
use App\Traits\SectionLoader;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Section extends Component
{
    /**
     * Create a new component instance.
     */
    use SectionLoader;

    public function __construct()
    {
        $this->loadSection('clients');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.client.section', [
            'sliders'   => getSlider('clients-section', new Slideshow),
            'customers' => Customer::orderBy('created_at', 'desc')
                ->take(12)
                ->get(),
            'data' => Setting::with(['layout', 'module', 'user'])
                ->first(),
        ]);
    }
}
