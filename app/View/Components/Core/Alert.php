<?php

namespace App\View\Components\Core;

use App\Models\Alert as ModelsAlert;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Alert extends Component
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
        return view('components.core.alert', [
            'alerts' => ModelsAlert::query()->where('is_active', true)->get()
        ]);
    }
}
