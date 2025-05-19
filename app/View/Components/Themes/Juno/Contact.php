<?php

namespace App\View\Components\Themes\Juno;

use App\Models\Setting;
use App\Traits\SectionLoader;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Contact extends Component
{
    /**
     * Create a new component instance.
     */
    use SectionLoader;

    public function __construct()
    {
        $this->loadSection('contact');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.themes.juno.contact');
    }

    public function contactData()
    {
        $contact = Setting::first();
        $data = [
            'email' => $contact->email,
        ];

        return $data;
    }
}
