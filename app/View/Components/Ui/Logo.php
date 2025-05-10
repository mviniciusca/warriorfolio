<?php

namespace App\View\Components\Ui;

use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Logo extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $logo = null,
        public ?string $logoDark = null,
        public ?string $logoSize = null,
        public ?string $link = null,
        ) {
        $setting = Setting::first(['design'])->design;
        $this->logo = $setting['logo'] ?? null;
        $this->logoDark = $setting['logo_dark'] ?? null;
        $this->logoSize = $setting['logo_size'] ?? null;
        $this->link = $setting['logo_link'] ?? config('app.url', env('APP_URL'));
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.logo', [
            //
        ]);
    }
}
