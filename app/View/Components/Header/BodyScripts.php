<?php

namespace App\View\Components\Header;

use Closure;
use App\Models\Setting;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class BodyScripts extends Component
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
        return view('components.header.body-scripts', [
            'info' => Setting::query()->select(['body_scripts'])->first(),
        ]);
    }
}
