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
        return view('components.header.meta', [
            'meta' => Setting::query()
                ->select(['name', 'favicon', 'meta_title', 'meta_description', 'meta_keywords', 'meta_author', 'meta_robots', 'meta_google_site_verification', 'google_analytics', 'header_scripts'])
                ->firstOrFail(),
        ]);
    }
}
