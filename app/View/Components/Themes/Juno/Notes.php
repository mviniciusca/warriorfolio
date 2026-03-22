<?php

namespace App\View\Components\Themes\Juno;

use App\Models\Module;
use App\Models\Page;
use App\Models\Setting;
use App\Traits\SectionLoader;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Notes extends Component
{
    use SectionLoader;

    public function __construct()
    {
        $this->loadSection('blog');
    }

    public function render(): View|Closure|string
    {
        $moduleBlog = (bool) (Module::query()->value('blog') ?? false);
        $blogSetting = Setting::query()->value('blog') ?? [];
        $blogSetting = is_array($blogSetting) ? $blogSetting : [];

        $headerTitle = filled($this->title)
            ? $this->title
            : (filled(data_get($blogSetting, 'header_title'))
                ? data_get($blogSetting, 'header_title')
                : __('Notes'));

        $headerSubtitle = filled($this->subtitle)
            ? $this->subtitle
            : data_get($blogSetting, 'header_subtitle');

        $ctaFromSetting = data_get($blogSetting, 'more_articles_btn_title');
        if (! filled($ctaFromSetting)) {
            $ctaFromSetting = data_get($blogSetting, 'button');
        }

        $ctaLabel = filled($this->button_header)
            ? $this->button_header
            : (filled($ctaFromSetting) ? $ctaFromSetting : __('View All'));

        $ctaUrl = $this->resolveCtaUrl(
            $this->button_url,
            data_get($blogSetting, 'button_url')
        );

        $ctaIcon = $this->button_icon ?: 'newspaper-outline';

        $headingVisible = $this->is_heading_visible ?? data_get($blogSetting, 'is_heading_visible', true);

        $showCta = (bool) ($this->content['show_button'] ?? true);

        return view('components.themes.juno.notes', [
            'posts' => Page::with(['post', 'post.category'])
                ->where('style', '=', 'blog')
                ->whereHas('post', function ($query) {
                    $query->where('is_active', '=', true);
                })
                ->where('is_active', '=', true)
                ->latest()
                ->take(6)
                ->get(),
            'module_blog' => $moduleBlog,
            'header_title' => $headerTitle,
            'header_subtitle' => $headerSubtitle,
            'cta_label' => $ctaLabel,
            'cta_url' => $ctaUrl,
            'cta_icon' => $ctaIcon,
            'heading_visible' => (bool) $headingVisible,
            'show_cta' => $showCta,
        ]);
    }

    private function resolveCtaUrl(?string $sectionUrl, ?string $settingUrl): string
    {
        $raw = $sectionUrl ?: $settingUrl;
        if ($raw === null || trim($raw) === '') {
            return url(config('warriorfolio.app_blog_basepath', 'blog/'));
        }

        $raw = trim($raw);
        if (preg_match('#^https?://#i', $raw)) {
            return $raw;
        }

        return url(ltrim($raw, '/'));
    }
}
