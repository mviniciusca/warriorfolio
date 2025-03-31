<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InfoBumper extends Component
{
    /**
     * Create a new component instance.
     */
    public $bumper_target;

    public $bumper_link;

    public $bumper_role;

    public $bumper_tag;

    public $bumper_title;

    public $bumper_icon;

    public $is_active;

    public $is_center;

    public $is_animated;

    public function __construct($bumper_icon = null, $bumper_title = null, $bumper_tag = null, $bumper_role = null, $bumper_link = null, $bumper_target = null, $is_active = null, $is_center = null, $is_animated = null)
    {
        $this->bumper_icon = $bumper_icon;
        $this->bumper_title = $bumper_title;
        $this->bumper_tag = $bumper_tag;
        $this->bumper_role = $bumper_role;
        $this->bumper_link = $bumper_link;
        $this->bumper_target = $bumper_target ?? '_self';
        $this->is_active = $is_active;
        $this->is_center = $is_center;
        $this->is_animated = $is_animated;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.info-bumper');
    }
}
