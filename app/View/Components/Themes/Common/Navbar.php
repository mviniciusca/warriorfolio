<?php

namespace App\View\Components\Themes\Common;

use App\Models\Navigation;
use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public $is_filled = false;

    public $navigation;

    public $is_menu_highlighted;

    public $darkmode_is_active;

    public $line_beam_is_active;

    public function __construct()
    {
        $settings = Setting::first(['design'])->value('design');
        $this->navigation = Navigation::first(['content'])->value('content');
        $this->is_menu_highlighted = $settings['is_menu_highlighted'] ?? false;
        $this->darkmode_is_active = $settings['darkmode_is_active'] ?? true;
        $this->line_beam_is_active = $settings['line_beam_is_active'] ?? false;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.themes.common.navbar');
    }
}
