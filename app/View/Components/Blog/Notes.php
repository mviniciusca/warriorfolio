<?php

namespace App\View\Components\Blog;

use App\Models\Category;
use App\Models\Module;
use App\Models\Page;
use App\Models\Profile;
use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Notes extends Component
{
    public function __construct()
    {
        //
    }

    public function render(): View|Closure|string
    {
        $searchTerm = request('search');
        $featuredPosts = $searchTerm ? collect() : $this->featured();

        $activeCategory = null;
        if (! $searchTerm && request('feed') === 'category') {
            $activeCategory = Category::query()
                ->where('is_active', true)
                ->find((int) request('category_id'));
        }

        return view('components.blog.notes', [
            'module_blog' => Module::first('blog')->blog,
            'profile' => Profile::first(),
            'profile_widget_status' => $this->getProfileWidgetStatus(),
            'featured_posts' => $featuredPosts,
            'posts' => $this->getPosts($searchTerm, $featuredPosts),
            'active_category' => $activeCategory,
        ]);
    }

    private function getPosts(?string $searchTerm = null, $featuredPosts = null)
    {
        $query = Page::with(['user.profile', 'post.category', 'post'])
            ->where('style', '=', 'blog')
            ->where('is_active', '=', true);

        if ($searchTerm) {
            $searchTerm = trim($searchTerm);

            $query->where(function ($q) use ($searchTerm) {
                $q->where('title', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('slug', 'LIKE', "%{$searchTerm}%")
                    ->orWhereHas('post', function ($postQuery) use ($searchTerm) {
                        $postQuery->where('content', 'LIKE', "%{$searchTerm}%")
                            ->orWhere('resume', 'LIKE', "%{$searchTerm}%");
                    })
                    ->orWhereHas('post.category', function ($categoryQuery) use ($searchTerm) {
                        $categoryQuery->where('name', 'LIKE', "%{$searchTerm}%");
                    })
                    ->orWhereHas('user', function ($userQuery) use ($searchTerm) {
                        $userQuery->where('name', 'LIKE', "%{$searchTerm}%");
                    });
            });

            $query->orderByRaw('
                CASE
                    WHEN title LIKE ? THEN 1
                    WHEN slug LIKE ? THEN 2
                    ELSE 3
                END, created_at DESC
            ', ["%{$searchTerm}%", "%{$searchTerm}%"]);
        } else {
            $feed = request('feed', 'for-you');
            if (! in_array($feed, ['for-you', 'featured', 'category'], true)) {
                $feed = 'for-you';
            }

            if ($feed === 'featured') {
                $query->whereHas('post', function ($q) {
                    $q->where('is_featured', true);
                });
            } elseif ($feed === 'category') {
                $categoryId = (int) request('category_id', 0);
                $categoryOk = Category::query()
                    ->where('is_active', true)
                    ->whereKey($categoryId)
                    ->exists();
                if ($categoryOk) {
                    $query->whereHas('post', function ($q) use ($categoryId) {
                        $q->where('category_id', $categoryId);
                    });
                }
            }

            if ($feed === 'for-you' && $featuredPosts && $featuredPosts->isNotEmpty()) {
                $query->whereNotIn('id', $featuredPosts->pluck('id'));
            }

            $query->orderBy('created_at', 'desc');
        }

        return $query->paginate(10);
    }

    public function getProfileWidgetStatus(): bool
    {
        return Setting::first('blog')?->blog['is_show_profile'] ?? false;
    }

    public function featured()
    {
        return Page::with(['user.profile', 'post.category', 'post'])
            ->where('style', '=', 'blog')
            ->whereHas('post', function ($query) {
                $query->where('is_featured', '=', true);
            })
            ->where('is_active', '=', true)
            ->orderBy('created_at', 'desc')
            ->take(20)
            ->get();
    }
}
