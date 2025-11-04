<?php

namespace App\View\Components\Themes\Common;

use App\Models\Maintenance as MaintenanceModel;
use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Maintenance extends Component
{
    /**
     * Create a new component instance.
     */
    public $maintenance;

    public function __construct()
    {
        $this->maintenance = MaintenanceModel::first() ?? null;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.themes.common.maintenance');
    }
}
