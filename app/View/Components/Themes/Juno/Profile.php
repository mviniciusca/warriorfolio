<?php

namespace App\View\Components\Themes\Juno;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Profile extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public bool $showAvatar = true,
        public bool $showName = true,
        public bool $showJobPosition = true,
        public bool $showCompany = true,
        public bool $showLocation = true,
        public bool $showEmail = true,
        public bool $showSkills = true,
        public bool $showSocial = true,
        public bool $showResume = true,
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.themes.juno.profile', [
            'data' => User::with('profile')->first(),
        ]);
    }
}
