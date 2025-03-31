<?php

namespace App\View\Components\Blog;

use App\Models\Module;
use App\Models\Profile;
use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Notes extends Component
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
        return view('components.blog.notes', [
            'module_blog'           => Module::first('blog')->blog,
            'profile'               => Profile::first(),
            'profile_widget_status' => $this->getProfileWidgetStatus(),
        ]);
    }

    /**
     * Get the profile widget status.
     * @return bool
     */
    public function getProfileWidgetStatus(): bool
    {
        return Setting::first('blog')?->blog['is_show_profile'] ?? false;
    }
}
