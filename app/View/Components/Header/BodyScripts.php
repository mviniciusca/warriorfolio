<?php

namespace App\View\Components\Header;

use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

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
            'info' => Setting::select('scripts')
                ->first()
                ->scripts,
        ]);
    }
}
