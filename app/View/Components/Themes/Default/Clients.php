<?php

namespace App\View\Components\Themes\Default;

use App\Models\Customer;
use App\Models\Slideshow;
use App\Traits\SectionLoader;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Clients extends Component
{
    /**
     * Create a new component instance.
     */
    use SectionLoader;

    public $sliders;

    public $customers;

    public function __construct()
    {
        $this->loadSection('clients');
        $this->sliders = $this->sliders();
        $this->customers = $this->customers();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.themes.default.clients');
    }

    public function sliders()
    {
        return getSlider('clients-section', new Slideshow);
    }

    public function customers()
    {
        return Customer::orderBy('created_at', 'desc')
            ->take(12)
            ->get();
    }
}
