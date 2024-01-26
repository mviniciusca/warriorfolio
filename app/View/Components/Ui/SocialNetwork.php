<?php

namespace App\View\Components\Ui;

use Closure;
use App\Models\Profile;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class SocialNetwork extends Component
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
        return view('components.ui.social-network', [
            'social' => Profile::query()
                ->select([
                    'facebook',
                    'twitter',
                    'instagram',
                    'linkedin',
                    'youtube',
                    'github',
                    'twitch',
                    'medium',
                    'dribbble',
                    'devto'
                ])
                ->first()
        ]);
    }
}
