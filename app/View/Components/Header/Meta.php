<?php

namespace App\View\Components\Header;

use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Meta extends Component
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
        public ?string $googleSiteVerification = null,
        public ?string $googleAnalytics = null,
        public ?string $headerScripts = null,
        public ?string $bodyScripts = null,

        // Google Fonts
        public ?string $googleFonts = null,
        public ?string $googleFontsCode = null,
    ) {
        // Initialize the component with default values
        $setting = Setting::sole(['meta', 'application', 'design', 'google', 'scripts']);

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
        $this->googleSiteVerification = $setting?->google['google_site_verification'] ?? null;
        $this->googleAnalytics = $setting?->google['google_analytics'] ?? null;
        $this->googleFonts = $setting?->google['google_fonts'] ?? 'Inter';
        $this->googleFontsCode = $setting?->google['google_fonts_code'] ?? null;

        // Scripts
        $this->headerScripts = $setting?->scripts['header_scripts'] ?? null;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.header.meta', [

        ]);
    }
}
