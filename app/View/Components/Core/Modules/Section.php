<?php

namespace App\View\Components\Core\Modules;

use App\Models\Section as SectionModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Section extends Component
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
        return view('components.core.modules.section', [
            'modules' => SectionModel::where('is_coupled', '=', true)
                ->get(),
        ]);
    }
}
