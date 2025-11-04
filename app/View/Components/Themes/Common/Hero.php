<?php

namespace App\View\Components\Themes\Common;

use App\Models\Hero as HeroSectionModel;
use App\Models\Slideshow;
use App\Traits\SectionLoader;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Hero extends Component
{
    /**
     * Create a new component instance.
     */
    use SectionLoader;

    public $hero;

    public function __construct()
    {
        $this->loadSection('hero');
        $this->hero = HeroSectionModel::where('is_active', '=', true)->first() ?? null;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.themes.common.hero');
    }
}
