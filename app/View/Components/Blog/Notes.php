<?php

namespace App\View\Components\Blog;

use App\Models\Module;
use App\Models\Page;
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
            'featured_post'         => $this->featured(),
            'posts'                 => Page::with(['user', 'category', 'post'])
                ->where('style', '=', 'blog')
                ->where('is_active', '=', true)
                ->orderBy('created_at', 'desc')
                ->paginate(10),
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

    public function featured()
    {
        return Page::with(['category', 'user', 'post'])
            ->where('style', '=', 'blog')
            ->whereHas('post', function ($query) {
                $query->where('is_featured', '=', true);
            })
            ->where('is_active', '=', true)
            ->orderBy('created_at', 'desc')
            ->first();
    }
}
