<?php

namespace App\View\Components;

use Closure;
use App\Models\Customer;
use App\Models\PagesSettings;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class CustomersSection extends Component
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
        return view('components.customers-section',[
            'customers' => Customer::all()->sortByDesc('id')->take(8),
            'customers_title' => PagesSettings::first()->customers_title,
            'customers_description' => PagesSettings::first()->customers_description,
        ]);
    }
}
