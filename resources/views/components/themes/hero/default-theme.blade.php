@props(['hero', 'icon' => null, 'browser_border_url' => $hero->content['browser_border_url'] ?? null])

<section id="default-hero-section">
    <div class="container mx-auto">
        {{-- Hero Section Heading --}}
        <div class="mx-auto mb-1 grid items-center justify-center text-center">
            <x-themes.common.partials.hero.heading :$hero />
        </div>
        {{-- Hero Section Button --}}
        <x-themes.common.partials.hero.buttons :$hero :justify="'center'" />
        {{-- Social Network --}}
        @if ($hero->content['social_network_module_is_active'] ?? (null ?? false))
        <div class="my-4" id="social-network-module">
            <x-ui.social-network :justify="'center'" class="animate__animated animate__fadeInDown animate__delay-1s"
                size="default" />
        </div>
        @endif
        {{-- Hero Section: Featured Image --}}
        @if ($hero->content['featured_image_is_active'] ?? false)
        <div class="animate__animated animate__fadeIn animate__delay-1s mx-auto my-2">
            <x-themes.common.partials.hero.featured-image :$hero />
        </div>
        @endif
    </div>
</section>
