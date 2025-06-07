<?php

namespace App\View\Components\Themes\Common;

use App\Models\Profile as ModelsProfile;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Profile extends Component
{
    public bool $centered;

    public ?string $variant;

    public ?string $size;

    /**
     * Create a new component instance.
     */
    public function __construct(
        bool $centered = false,
        ?string $variant = 'default',
        ?string $size = 'md'
    ) {
        $this->centered = $centered;
        $this->variant = $variant;
        $this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.themes.common.profile', [
            'profile'  => ModelsProfile::with(['user'])->sole(),
            'centered' => $this->centered,
            'variant'  => $this->variant,
            'size'     => $this->size,
        ]);
    }
}
