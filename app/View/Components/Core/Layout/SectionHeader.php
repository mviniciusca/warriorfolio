<?php

namespace App\View\Components\Core\Layout;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SectionHeader extends Component
{
    /**
     * Create a new component instance.
     */
    public ?bool $is_heading_visible;

    public ?bool $is_centered;

    public ?string $title;

    public ?string $subtitle;

    public ?string $button_header;

    public ?string $button_url;

    public function __construct()
    {
        $this->title = null;
        $this->subtitle = null;
        $this->is_heading_visible = null;
        $this->button_header = null;
        $this->button_url = null;
        $this->is_centered = null;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.core.layout.section-header');
    }
}
