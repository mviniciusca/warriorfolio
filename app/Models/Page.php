<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Post;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Page extends \Z3d0X\FilamentFabricator\Models\Page
{
    protected $guarded = [];

    protected $casts = [
        'seo'                   => 'array',
        'blocks'                => 'array',
        'publish_at'            => 'datetime',
        'expire_at'             => 'datetime',
        'is_password_protected' => 'boolean',
        'open_in_new_tab'       => 'boolean',
        'show_breadcrumbs'      => 'boolean',
        'show_title'            => 'boolean',
    ];

    /**
     * Get the category that the page belongs to.
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the post that the page belongs to.
     *
     * @return BelongsTo
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Get the project that the page belongs to.
     *
     * @return BelongsTo
     */
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * Get the user that owns the page.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The "booted" method of the model.
     * Deletes the associated post when the page is deleted.
     *
     * @return void
     */
    protected static function booted(): void
    {
        static::deleted(function ($page) {
            if ($page->post) {
                $page->post->delete();
            }
            if ($page->project) {
                $page->project->delete();
            }
        });
    }

    // Relação "relatedPages" removida pois já existe no sistema

    public function tabsSection()
    {
        $tabs = [
            'github-repositories' => 'Repositories',
            'portfolio'           => 'Portfolio',
            'blog'                => 'Blog',
            'about-me'            => 'About Me',
            'contact'             => 'Contact',
        ];

        $activeSections = Section::whereIn('slug', array_keys($tabs))
            ->where('is_active', true)
            ->get()
            ->keyBy('slug');

        // Retorna apenas as tabs com seções ativas
        $result = [];
        foreach ($tabs as $slug => $label) {
            // Se a seção existe e está ativa, ou se é 'github-repositories' (que é sempre ativo)
            if ($slug === 'github-repositories' || isset($activeSections[$slug])) {
                $result[$slug] = $label;
            }
        }

        return $result;
    }
}
