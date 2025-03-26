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
                {{-- Hero Section: Image --}}
                @if ($hero->hero['featured_image'] ?? false)
                    <div class="mx-auto" id="hero-featured-image">
                        @if(($hero->hero['browser_border_is_active'] ?? false) ?? false)
                            <x-ui.browser-border :url='$browser_border_url'>
                                <img class="mx-auto rounded-none" src="{{ asset('storage/' . $hero->hero['featured_image']) }}"
                                    alt="hero-section-featured-image" />
                            </x-ui.browser-border>
                        @else
                            <img class="hero-section-featured-border" src="{{ asset('storage/' . $hero->hero['featured_image']) }}"
                                alt="hero-section-featured-image" />
                        @endif
                    </div>
                @else
                    <div class="mx-auto" id="hero-featured-image">
                        @if(($hero->hero['browser_border_is_active'] ?? false) ?? false)
                            <x-ui.browser-border>
                                <img src="{{ asset('img/core/demo/default-landing-image.png') }}" alt="Default Hero Image"
                                    class="h-auto w-full hidden dark:block" />
                                <img src="{{ asset('img/core/demo/default-landing-image-light.png') }}" alt="Default Hero Image"
                                    class="h-auto w-full block dark:hidden" />
                            </x-ui.browser-border>
                        @else
                            <img src="{{ asset('img/core/demo/default-landing-image.png') }}" alt="Default Hero Image"
                                class="h-auto p-2 mx-auto hero-section-featured-border w-full hidden dark:block" />
                            <img src="{{ asset('img/core/demo/default-landing-image-light.png') }}" alt="Default Hero Image Light"
                                class="h-auto p-2 mx-auto hero-section-featured-border w-full block dark:hidden" />
                        @endif
                    </div>
                @endif
            </div>
        @endif
    </div>
</section>
