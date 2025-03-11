<?php

namespace App\View\Components\Hero;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonGroup extends Component
{
    /**
     * Button Group for Hero Section
     */
    public $target;

    public $title;

    public ?string $icon;

    public $url;

    public $style;

    public function __construct($url = null, $title = null, $target = '_self', $icon = null, $style = 'filled')
    {
        $this->url = $url;
        $this->icon = $icon ?? 'arrow-forward-sharp';
        $this->style = $style;
        $this->title = $title;
        $this->target = $target;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.hero.button-group');
    }
}
