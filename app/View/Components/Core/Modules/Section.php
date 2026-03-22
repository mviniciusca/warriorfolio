<?php

namespace App\View\Components\Core\Modules;

use App\Models\Section as SectionModel;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Section extends Component
{
    /**
     * Coupled modules only (GitHub is added via Page Builder block `github-repositories` on default layout).
     *
     * @var list<string>
     */
    private const MODULE_ORDER = [
        'hero',
        'blog',
        'about-me',
        'portfolio',
        'clients',
        'contact',
        'newsletter',
    ];

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
        $modules = SectionModel::query()
            ->where('is_coupled', true)
            ->get();

        $order = array_flip(self::MODULE_ORDER);
        $modules = $modules
            ->sortBy(fn (SectionModel $m): int => $order[$m->slug] ?? 1000)
            ->values();

        return view('components.core.modules.section', [
            'modules' => $modules,
        ]);
    }
}
