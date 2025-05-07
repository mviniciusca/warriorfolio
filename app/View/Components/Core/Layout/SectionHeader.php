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
    public function __construct(
        public ?string $title = null,
        public ?string $subtitle = null,
        public ?bool $is_heading_visible = null,
        public ?bool $is_centered = null,
        public ?string $button_header = null,
        public ?string $button_url = null,
        public ?string $button_icon = null,
        public ?string $module_slug = null,
        public ?string $module_name = null,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.core.layout.section-header');
    }
}
