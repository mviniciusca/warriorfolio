{{-- Hero Background: Pattern and Image --}}

@if ($hero->hero['is_active'] ?? false)
    <div id="hero-fading-overlay"
        class="{{ ($hero->hero['is_bg_blur'] ?? true) ? 'backdrop-blur-3xl' : 'backdrop-blur-0' }} -z-[30] m-auto md:h-[480px] lg:h-[900px] w-full {{ ($hero->hero['bg_overlay'] ?? null) ?? 'hero-bg-overlay-default' }} {{ ($hero->hero['is_overlay_active'] ?? true) ? 'absolute' : 'hidden' }}">
    </div>
    @if ($hero->hero['is_pattern_bg'] ?? false)
        <div id="hero-background-image-pattern"
            class="{{ $hero->hero['bg_size'] ?? 'bg-cover' }} {{ $hero->hero['bg_position'] ?? 'bg-center' }} {{ $hero->hero['bg_repeat'] ?? 'bg-no-repeat' }} bg-hero absolute -z-50 m-auto md:h-[480px] lg:h-[600px] w-full bg-fixed opacity-20 transition-all duration-100 filter dark:opacity-20 dark:invert"
            style="background-image: url('{{ asset('img/core/core-ui-elements/patterns/' . ($hero->hero['pattern_name'] ?? 'cross') . '.svg') }}')">
        </div>
    @elseif ($hero->hero['bg_image'] ?? false)
        <div id="hero-background-image"
            class="{{ $hero->hero['bg_size'] ?? 'bg-cover' }} {{ $hero->hero['bg_position'] ?? 'bg-center' }} {{ $hero->hero['bg_repeat'] ?? 'bg-no-repeat' }} transition-all duration-100 bg-hero absolute -z-50 m-auto md:h-[480px] {{ ($hero->hero['is_bg_grayscale'] ?? false) ? 'filter grayscale' : 'filter-none grayscale-0' }} lg:h-[900px] w-full bg-fixed"
            style="background-image: url('{{ asset('storage/' . $hero->hero['bg_image']) }}')">
        </div>
    @endif
@endif
