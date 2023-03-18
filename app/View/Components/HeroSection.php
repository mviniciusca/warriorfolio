<?php

namespace App\View\Components;

use App\Models\HeroBackground;
use App\Models\Profile;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HeroSection extends Component
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
        return view('components.hero-section', [
           'background' => HeroBackground::where('is_active', true)->first(),
           'profile' => Profile::first(),
        ]);
    }
}
