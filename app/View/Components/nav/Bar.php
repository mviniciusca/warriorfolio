<?php

namespace App\View\Components\nav;

use Closure;
use App\Models\Link;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class bar extends Component
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
        return view('components.nav.bar',[
            'links' => Link::all(),
        ]);
    }
}
