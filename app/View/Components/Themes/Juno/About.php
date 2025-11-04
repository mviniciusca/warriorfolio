<?php

namespace App\View\Components\Themes\Juno;

use App\Filament\Fabricator\PageBlocks\Component\Module;
use App\Models\Course;
use App\Models\Section;
use App\Models\User;
use App\Traits\SectionLoader;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class About extends Component
{
    use SectionLoader;

    public function __construct(
        ) {
        $this->loadSection('about-me');
    }

    public function render(): View|Closure|string
    {
        return view('components.themes.juno.about', [
            'data'    => User::with('profile')->first(),
            'courses' => Course::orderBy('start_date', 'desc')->get(),
        ]);
    }
}
