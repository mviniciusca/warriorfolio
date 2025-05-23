{{--

This is featured image partial for hero section.
-------------------------------------------------------------------

--}}

@props([
'hero',
'icon' => null,
'browser_border_url' => $hero->content['browser_border_url'] ?? null,
'has_darkmode_image' => $hero->content['dark_mode_featured_image'] ?? false,
'device' => $hero->content['browser_border_device'] ?? 'browser',
])

{{-- Hero Section: Image --}}
@if ($hero->content['featured_image'] ?? false)
<div class="mx-auto" id="hero-featured-image">
    @if(($hero->content['browser_border_is_active'] ?? false) ?? false)
    <x-ui.browser-border :$device :url='$browser_border_url'>
        <img class="mx-auto rounded-none {{ $has_darkmode_image ? 'block dark:hidden' : '' }}"
            src="{{ asset('storage/' . $hero->content['featured_image']) }}" alt="hero-section-featured-image" />
        @if ($has_darkmode_image ?? false)
        <img class="mx-auto rounded-none hidden dark:block"
            src="{{ asset('storage/' . $hero->content['dark_mode_featured_image']) }}"
            alt="hero-section-featured-image" />
        @endif
    </x-ui.browser-border>
    @else
    <img class="hero-section-featured-border {{ $has_darkmode_image ? 'block dark:hidden' : '' }}"
        src="{{ asset('storage/' . $hero->content['featured_image']) }}" alt="hero-section-featured-image" />
    @if($has_darkmode_image ?? false)
    <img class="hero-section-featured-border hidden dark:block"
        src="{{ asset('storage/' . $hero->content['dark_mode_featured_image']) }}" alt="hero-section-featured-image" />
    @endif
    @endif
</div>
@else
<div class="mx-auto" id="hero-featured-image">
    @if(($hero->content['browser_border_is_active'] ?? false) ?? false)
    <x-ui.browser-border>
        <img src="{{ asset('img/core/demo/default-landing-image.png') }}" alt="Default Hero Image"
            class="h-auto w-full hidden dark:block" />
        <img src="{{ asset('img/core/demo/default-landing-image-light.png') }}" alt="Default Hero Image Light"
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
