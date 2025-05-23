{{--

Core Component: Hero Section / Theme / Default Theme
----------------------------------------------------------------
This is the Default Theme for Hero Section
-------------------------------------------------------------------
Data:
App\View\Components\Themes\Hero\Default-Theme.php

--}}

@props(['hero', 'icon' => null, 'browser_border_url' => $hero->hero['browser_border_url'] ?? null])

<section class="relative w-full py-8" id="default-hero-section">
    <div class="container mx-auto">
        {{-- Hero Section Heading --}}
        <div class="mx-auto mb-1 grid items-center justify-center text-center">
            <x-hero.heading :$hero />
        </div>
        {{-- Hero Section Button --}}
        <x-themes.hero.partials.buttons :hero="$hero" :justify="'center'" />
        {{-- Social Network --}}
        @if ($hero->hero['social_network_module_is_active'] ?? (null ?? false))
            <div class="mb-8" id="social-network-module">
                <x-ui.social-network :justify="'center'" class="animate__animated animate__fadeInDown animate__delay-1s"
                    size="big" />
            </div>
        @endif
        {{-- Hero Section: Featured Image --}}
        @if ($hero->hero['featured_image_is_active'] ?? false)
            <div class="animate__animated animate__fadeInUp animate__delay-1s mx-auto mt-4">
                <x-themes.hero.partials.featured-image :hero="$hero" />
            </div>
        @endif
    </div>
</section>
