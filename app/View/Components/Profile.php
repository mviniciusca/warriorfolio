<?php

namespace App\View\Components;

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
        public ?string $containerClass = '',
        public ?string $avatarClass = '',
        public ?string $nameClass = '',
        public ?string $jobPositionClass = '',
        public ?string $infoContainerClass = '',
        public ?string $infoItemClass = '',
        public ?string $skillsContainerClass = '',
        public ?string $skillItemClass = '',
        public ?string $socialContainerClass = '',
        public ?string $downloadButtonClass = ''
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.profile', [
            'data' => User::with('profile')->first(),
        ]);
    }
}
