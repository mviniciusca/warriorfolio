<?php

namespace App\View\Components;

use Closure;
use App\Models\Setting;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class ContactSection extends Component
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
        return view('components.contact-section', [
            'contact_title'         => Setting::first()->contact_title,
            'contact_description'   => Setting::first()->contact_description,
        ]);
    }
}
