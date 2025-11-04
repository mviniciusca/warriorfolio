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
        $searchTerm = request('search');

        return view('components.blog.notes', [
            'module_blog'           => Module::first('blog')->blog,
            'profile'               => Profile::first(),
            'profile_widget_status' => $this->getProfileWidgetStatus(),
            'featured_post'         => $searchTerm ? null : $this->featured(), // Hide featured post during search
            'posts'                 => $this->getPosts($searchTerm),
        ]);
    }

    /**
     * Get posts with optional search filtering.
     */
    private function getPosts(?string $searchTerm = null)
    {
        $query = Page::with(['user', 'post.category', 'post'])
            ->where('style', '=', 'blog')
            ->where('is_active', '=', true);

        if ($searchTerm) {
            // Clean and prepare search term
            $searchTerm = trim($searchTerm);

            $query->where(function ($q) use ($searchTerm) {
                // Search in page title and slug
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('slug', 'LIKE', "%{$searchTerm}%")
                  // Search in post content and resume
                    ->orWhereHas('post', function ($postQuery) use ($searchTerm) {
                        $postQuery->where('content', 'LIKE', "%{$searchTerm}%")
                            ->orWhere('resume', 'LIKE', "%{$searchTerm}%");
                    })
                  // Search in post category (through post relationship)
                    ->orWhereHas('post.category', function ($categoryQuery) use ($searchTerm) {
                        $categoryQuery->where('name', 'LIKE', "%{$searchTerm}%");
                    })
                  // Search in author name
                    ->orWhereHas('user', function ($userQuery) use ($searchTerm) {
                        $userQuery->where('name', 'LIKE', "%{$searchTerm}%");
                    });
            });

            // Order by relevance (title matches first, then slug)
            $query->orderByRaw('
                CASE
                    WHEN title LIKE ? THEN 1
                    WHEN slug LIKE ? THEN 2
                    ELSE 3
                END, created_at DESC
            ', ["%{$searchTerm}%", "%{$searchTerm}%"]);
        } else {
            $query->orderBy('created_at', 'desc');
        }

        return $query->paginate(10);
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
        return Page::with(['user', 'post.category', 'post'])
            ->where('style', '=', 'blog')
            ->whereHas('post', function ($query) {
                $query->where('is_featured', '=', true);
            })
            ->where('is_active', '=', true)
            ->orderBy('created_at', 'desc')
            ->first();
    }
}
