{{-- Hero Background: Pattern and Image --}}

@if ($hero->hero['is_active'] ?? false)
    {{-- Fading Overlay - positioned behind the background --}}
    <div id="hero-fading-overlay"
        class="absolute -z-[30] m-auto md:h-[480px] lg:h-[900px] w-full bg-gradient-to-t dark:from-secondary-950 dark:via-black/80 dark:to-black/60 transition-all duration-300 from-white/100 via-white/80 to-white/0">
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
