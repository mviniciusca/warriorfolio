<?php

namespace App\View\Components\Ui;

use Closure;
use App\Models\Setting;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Background extends Component
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
        return view('components.ui.background', [
            'info' => Setting::query()
                ->select([
                    'background_image',
                    'background_image_visibility',
                    'background_image_position',
                    'background_image_size',
                    'background_image_repeat',
                ])
                ->first(),
        ]);
    }
}
