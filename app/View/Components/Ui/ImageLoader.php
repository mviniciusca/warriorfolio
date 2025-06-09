<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ImageLoader extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $src,
        public string $alt = '',
        public string $class = '',
        public string $placeholderClass = '',
        public bool $showPlaceholder = true,
        public bool $lazy = true,
        public bool $animated = true,
        public string $rounded = 'rounded-lg'
    ) {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.image-loader');
    }
}
