{{--

Core Component: Hero Section / Theme / Default Theme
----------------------------------------------------------------
This is the Default Theme for Hero Section
-------------------------------------------------------------------
Data:
App\View\Components\Themes\Hero\Default-Theme.php

--}}

@props(['hero', 'icon' => null, 'browser_border_url' => $hero->hero['browser_border_url'] ?? null])

<section>
    <div class="mx-auto mt-4 grid items-center justify-center text-center">
        <x-hero.heading :$hero />
        {{-- Hero Section: Buttons --}}
        <div class="animate__animated animate__fadeInUp animate__delay-1s z-10 flex justify-center gap-4">
            {{-- Hero Section Button --}}
            @foreach ($hero->hero['buttons'] as $button)
                <x-hero.button-group :title="$button['button_title']" :style="$button['button_style']"
                    :target="$button['button_target']" :url="$button['button_url']" :icon="$button['icon']" />
            @endforeach
        </div>
    </div>
    </div>
    @if($hero->hero['social_network_module_is_active'] ?? false)
        <div id="social-network-module">
            <x-ui.social-network size="big" :justify="'center'"
                class="mt-8 animate__animated animate__fadeInDown animate__delay-1s" />
        </div>
    @endif
    @if ($hero->hero['featured_image_is_active'] ?? false)
        <div class="animate__animated animate__fadeInUp animate__delay-1s lg:col-span-5 lg:mt-0 lg:flex mt-4">
            {{-- Hero Section: Image --}}
            @if ($hero->hero['featured_image'] ?? false)
                <div class="mx-auto" id="hero-featured-image">
                    @if(($hero->hero['browser_border_is_active'] ?? false) ?? false)
                        <x-ui.browser-border :url='$browser_border_url'>
                            <img class="mx-auto rounded-none" src="{{ asset('storage/' . $hero->hero['featured_image']) }}"
                                alt="hero-section-featured-image" />
                        </x-ui.browser-border>
                    @else
                        <img class=hero-section-featured-border" src="{{ asset('storage/' . $hero->hero['featured_image']) }}"
                            alt="hero-section-featured-image" />
                    @endif
            @else
                @if(($hero->hero['browser_border_is_active'] ?? false) ?? false)
                    <x-ui.browser-border>
                        <img src="{{ asset('img/core/demo/default-landing-image.png') }}" alt="Default Hero Image"
                            class="h-auto w-full" />
                    </x-ui.browser-border>
                @else
                    <img src="{{ asset('img/core/demo/default-landing-image.png') }}" alt="Default Hero Image"
                        class="h-auto w-full" />
                @endif
            @endif
            </div>
    @endif
    </div>
    </div>
</section>
