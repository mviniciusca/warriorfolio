<?php

namespace App\View\Components;

use Closure;
use App\Models\PagesSettings;
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
            'contact_title' => PagesSettings::first()->contact_title,
            'contact_description' => PagesSettings::first()->contact_description,
        ]);
    }
}
