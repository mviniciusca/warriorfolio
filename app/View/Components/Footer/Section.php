<?php

namespace App\View\Components\Footer;

use App\Models\Layout;
use App\Models\Module;
use App\Models\Navigation;
use App\Models\Profile;
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
        return view('components.footer.section', [
            'data' => Layout::first([
                'footer',
            ]),
            'setting' => Setting::first([
                'design',
                'application',
            ]),
            'module' => Module::first([
                'footer',
            ]),
            'navigation' => Navigation::select('content')
                ->get(),
            'social' => Profile::select('social')
                ->get(),
        ]);
    }
}
