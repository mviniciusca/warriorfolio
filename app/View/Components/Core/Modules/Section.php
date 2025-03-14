<?php

namespace App\View\Components\Core\Modules;

use App\Models\Core;
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
            $module = Core::all(),
            'blog_core'    => $module->select('blog')->value('blog'),
            'hero_core'    => $module->select('hero')->value('hero'),
            'about_core'   => $module->select('about')->value('about'),
            'contact_core' => $module->select('contact')->value('contact'),
            'footer_core'  => $module->select('footer')->value('footer'),
            'header_core'  => $module->select('header')->value('header'),
            'clients_core' => $module->select('clients')->value('clients'),
        ]);
    }
}
