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
        'advanced_settings'     => 'array',
        'publish_at'            => 'datetime',
        'expire_at'             => 'datetime',
        'is_password_protected' => 'boolean',
    ];

    /**
     * Page Behavior - Métodos mantidos para compatibilidade com JSON
     */
    public function getRedirectUrlAttribute()
    {
        return $this->advanced_settings['behavior']['redirect_url'] ?? null;
    }

    public function setRedirectUrlAttribute($value)
    {
        $this->attributes['advanced_settings'] = array_merge(
            $this->advanced_settings ?? [],
            ['behavior' => array_merge($this->advanced_settings['behavior'] ?? [], ['redirect_url' => $value])]
        );
    }

    public function getRedirectTypeAttribute()
    {
        return $this->advanced_settings['behavior']['redirect_type'] ?? null;
    }

    public function setRedirectTypeAttribute($value)
    {
        $this->attributes['advanced_settings'] = array_merge(
            $this->advanced_settings ?? [],
            ['behavior' => array_merge($this->advanced_settings['behavior'] ?? [], ['redirect_type' => $value])]
        );
    }

    public function getOpenInNewTabAttribute()
    {
        return $this->advanced_settings['behavior']['open_in_new_tab'] ?? true;
    }

    public function setOpenInNewTabAttribute($value)
    {
        $this->attributes['advanced_settings'] = array_merge(
            $this->advanced_settings ?? [],
            ['behavior' => array_merge($this->advanced_settings['behavior'] ?? [], ['open_in_new_tab' => $value])]
        );
    }

    // Display Options
    public function getShowBreadcrumbsAttribute()
    {
        return $this->advanced_settings['display']['show_breadcrumbs'] ?? true;
    }

    public function setShowBreadcrumbsAttribute($value)
    {
        $this->attributes['advanced_settings'] = array_merge(
            $this->advanced_settings ?? [],
            ['display' => array_merge($this->advanced_settings['display'] ?? [], ['show_breadcrumbs' => $value])]
        );
    }

    public function getShowTitleAttribute()
    {
        return $this->advanced_settings['display']['show_title'] ?? true;
    }

    public function setShowTitleAttribute($value)
    {
        $this->attributes['advanced_settings'] = array_merge(
            $this->advanced_settings ?? [],
            ['display' => array_merge($this->advanced_settings['display'] ?? [], ['show_title' => $value])]
        );
    }

    public function getSidebarPositionAttribute()
    {
        return $this->advanced_settings['display']['sidebar_position'] ?? 'none';
    }

    public function setSidebarPositionAttribute($value)
    {
        $this->attributes['advanced_settings'] = array_merge(
            $this->advanced_settings ?? [],
            ['display' => array_merge($this->advanced_settings['display'] ?? [], ['sidebar_position' => $value])]
        );
    }

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
     * Handle the lifecycle events for Page model.
     */
    protected static function booted(): void
    {
        // Quando uma page é criada, garantir que o post também seja criado se necessário
        static::creating(function ($page) {
            // Se é uma página de blog e não tem post_id, criar o post
            if ($page->style === 'blog' && ! $page->post_id) {
                $post = Post::create([
                    'user_id'     => $page->user_id,
                    'is_active'   => $page->is_active ?? true,
                    'is_featured' => false,
                ]);
                $page->post_id = $post->id;
            }
        });

        // Quando uma page é atualizada, sincronizar com o post
        static::updated(function ($page) {
            if ($page->post && $page->isDirty('is_active')) {
                $page->post->update([
                    'is_active' => $page->is_active,
                ]);
            }
        });

        // Quando uma page é deletada, deletar o post/project associado
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
