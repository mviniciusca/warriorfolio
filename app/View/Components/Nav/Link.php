<?php

namespace App\View\Components\Nav;

use Closure;
use App\Models\Link as LinkModel;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Link extends Component
{
    /**
     * Create a new component instance.
     */
    public $links;
    public function __construct()
    {
        $this->links = LinkModel::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.nav.link');
    }
}
