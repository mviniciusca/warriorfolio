{{--

Core Component: Hero Section / Theme / Default Theme
----------------------------------------------------------------
This is the Default Theme for Hero Section
-------------------------------------------------------------------
Data:
App\View\Components\Themes\Hero\Default-Theme.php

--}}

@props(['hero', 'icon' => null, 'browser_border_url' => $hero->hero['browser_border_url'] ?? null])

<section id="default-hero-section" class="relative w-full py-8">
    <div class="container mx-auto">
        {{-- Hero Section Heading --}}
        <div class="mx-auto mb-4 grid items-center justify-center text-center">
            <x-hero.heading :$hero />
        </div>
        {{-- Hero Section Button --}}
        <div class="animate__animated animate__fadeInUp animate__delay-1s flex justify-center gap-4 mb-8 w-full">
            @foreach ($hero->hero['buttons'] as $button)
                <x-hero.button-group :title="$button['button_title']" :style="$button['button_style']"
                    :target="$button['button_target']" :url="$button['button_url']" :icon="$button['icon']" />
            @endforeach
        </div>
        {{-- Social Network --}}
        @if(($hero->hero['social_network_module_is_active'] ?? null) ?? false)
            <div id="social-network-module" class="mb-8">
                <x-ui.social-network size="big" :justify="'center'"
                    class="animate__animated animate__fadeInDown animate__delay-1s" />
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
