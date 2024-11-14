<?php

namespace App\View\Components\Header;

use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Meta extends Component
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
        return view('components.header.meta', [
            'meta'    => $this->getMeta(),
            'app'     => $this->getApplication(),
            'design'  => $this->getDesign(),
            'google'  => $this->getGoogle(),
            'scripts' => $this->getScripts(),
        ]);
    }

    public function getMeta(): mixed
    {
        return  Setting::select(['meta'])->first()->meta;
    }

    public function getApplication(): mixed
    {
        return  Setting::select(['application'])->first()->application;
    }

    public function getGoogle(): mixed
    {
        return  Setting::select(['google'])->first()->google;
    }

    public function getDesign(): mixed
    {
        return  Setting::select(['design'])->first()->design;
    }

    public function getScripts(): mixed
    {
        return  Setting::select(['scripts'])->first()->scripts;
    }
}
