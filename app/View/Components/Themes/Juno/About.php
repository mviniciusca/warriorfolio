<?php

namespace App\View\Components\Themes\Juno;

use App\Filament\Fabricator\PageBlocks\Component\Module;
use App\Models\Course;
use App\Models\Section;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class About extends Component
{
    public function __construct(
        public bool $is_active = false,
        public bool $is_coupled = false
        ) {
        $module = Section::where('slug', 'about-me')->first();
        $this->is_active = $module->is_active;
        $this->is_coupled = $module->is_coupled;
    }

    public function render(): View|Closure|string
    {
        return view('components.themes.juno.about', [
            'data'    => User::with('profile')->first(),
            'courses' => Course::orderBy('start_date', 'desc')->get(),
        ]);
    }
}
