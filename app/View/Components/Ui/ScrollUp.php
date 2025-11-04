<?php

namespace App\View\Components\Ui;

use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ScrollUp extends Component
{
    /**
     * Create a new component instance.
     */
    public bool $is_active;

    public function __construct()
    {
        $this->is_active = Setting::first(['config'])->config['scroll_up_is_active'] ?? true;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.scroll-up');
    }
}
