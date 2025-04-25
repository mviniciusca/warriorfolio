<?php

namespace App\View\Components\Themes\Juno;

use App\Models\Course;
use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class About extends Component
{
    public function __construct()
    {
    }

    public function render(): View|Closure|string
    {
        return view('components.themes.juno.about', [
            'data'    => User::with('profile')->first(),
            'courses' => Course::orderBy('start_date', 'desc')->get(),
        ]);
    }
}
