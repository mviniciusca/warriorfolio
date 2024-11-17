<?php

namespace App\View\Components\Header;

use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Meta extends Component
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
        $setting = Setting::first(['meta', 'application', 'design', 'google', 'scripts']);

        return view('components.header.meta', [

            'meta'    => $setting?->meta ?? [],
            'app'     => $setting?->application ?? [],
            'design'  => $setting?->design ?? [],
            'google'  => $setting?->google ?? [],
            'scripts' => $setting?->scripts ?? [],
        ]);
    }
}
