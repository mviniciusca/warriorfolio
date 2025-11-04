{{--

Core Component: Hero Section / Theme / Sierra Theme
----------------------------------------------------------------
This is the Sierra Theme for Hero Section
-------------------------------------------------------------------
Data:
App\View\Components\Themes\Hero\Sierra-Theme.php

--}}

@props(['hero'])


<section class="sierra-theme {{ !$hero->content['featured_image_is_active'] ?? false ? 'mb-8' : '' }}"
    id="sierra-hero-theme">
    <div
        class="{{ $hero->content['is_mailing_active'] ? 'items-start' : 'items-center' }} mx-auto mt-8 grid max-w-screen-xl gap-8 md:gap-16 lg:grid-cols-2">
        <div class="mr-auto place-self-center lg:col-span-1">
            <x-themes.common.partials.hero.heading :hero="$hero" />
            {{-- Social Network --}}
            @if ($hero->content['social_network_module_is_active'] ?? false)
            <div id="social-network-module">
                <x-ui.social-network :justify="'start'"
                    class="animate__animated animate__fadeInDown animate__delay-1s my-4" size="default" />
            </div>
            @endif
            {{-- Hero Section Button --}}
            <x-themes.common.partials.hero.buttons :hero="$hero" :justify="'start'" />
            {{-- Newsletter Module --}}
            @if (data_get($hero, 'content.is_mailing_active') ?? true)
            <div class="animate__animated animate__slideInDown max-w-80 py-4">
                <p class="py-4 text-base">{{ __('Join your mailing list.') }}</p>
                @livewire('newsletter')
            </div>
            @endif
        </div>
        {{-- Hero Section: Featured Image --}}
        <div class="animate__animated animate__fadeIn animate__delay-1s flex justify-center lg:col-span-1">
            @if ($hero->content['featured_image_is_active'] ?? false)
            <div class="mt-8 flex items-center" id="hero-featured-image">
                <x-themes.common.partials.hero.featured-image :hero="$hero" />
            </div>
            @endif
        </div>
    </div>
    </div>
</section>
