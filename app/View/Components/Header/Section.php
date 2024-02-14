<?php

namespace App\View\Components\Header;

use App\Models\Navigation;
use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Section extends Component
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
        return view('components.header.section', [
            'navigation' => Navigation::all()->first()->content,
            'app' => Setting::query()->select(['logo', 'logo_dark_mode', 'logo_size'])->first(),
        ]);
    }
}
