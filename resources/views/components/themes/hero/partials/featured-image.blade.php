@props(['hero', 'icon' => null, 'browser_border_url' => $hero->hero['browser_border_url'] ?? null])

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
