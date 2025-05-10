<?php

namespace App\View\Components\Core\Modules;

use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public ?string $metaTitle = null,
        public ?string $metaDescription = null,
        public ?string $metaKeywords = null,
        public ?string $metaAuthor = null,
        public ?string $metaRobots = null,

        public ?string $favicon = null,

        public ?string $headerScripts = null,
        public ?string $bodyScripts = null,

        public ?string $googleSiteVerification = null,
        public ?string $googleAnalytics = null,
        public ?string $googleFonts = null,
        public ?string $googleFontsCode = null,
    ) {
        $setting = Setting::first(['meta', 'application', 'design', 'google', 'scripts']);

        // Meta Tags
        $this->metaTitle = $setting?->meta['meta_title'] ?? null;
        $this->metaDescription = $setting?->meta['meta_description'] ?? null;
        $this->metaKeywords = $setting?->meta['meta_keywords'] ?? null;
        $this->metaAuthor = $setting?->meta['meta_author'] ?? null;

        // Favicon
        $this->favicon = $setting?->design['favicon'] ?? null;

        // Robots
        $this->metaRobots = $setting?->meta['meta_robots'] ?? null;

        // Google Services and Integrations
        $this->googleSiteVerification = $setting?->google['tag'] ?? null;
        $this->googleAnalytics = $setting?->google['analytics'] ?? null;
        $this->googleFonts = $setting?->google['font_name'] ?? 'Inter';
        $this->googleFontsCode = $setting?->google['fonts_code'] ?? null;

        // Scripts
        $this->headerScripts = $setting?->scripts['header_scripts'] ?? null;
        $this->bodyScripts = $setting?->scripts['body_scripts'] ?? null;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.core.modules.header');
    }
}
