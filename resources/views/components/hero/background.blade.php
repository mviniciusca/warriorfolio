{{-- Hero Background: Pattern and Image --}}

@props([
    'isActive' => $hero->hero['is_active'] ?? false,
    'isBgBlur' => $hero->hero['is_bg_blur'] ?? true,
    'bgOverlay' => $hero->hero['bg_overlay'] ?? 'hero-bg-overlay-default',
    'isOverlayActive' => $hero->hero['is_overlay_active'] ?? true,
    'isPatternBg' => $hero->hero['is_pattern_bg'] ?? false,
    'bgSize' => $hero->hero['bg_size'] ?? 'bg-cover',
    'bgPosition' => $hero->hero['bg_position'] ?? 'bg-center',
    'bgRepeat' => $hero->hero['bg_repeat'] ?? 'bg-no-repeat',
    'patternName' => $hero->hero['pattern_name'] ?? 'cross',
    'bgImage' => $hero->hero['bg_image'] ?? false,
    'isBgGrayscale' => $hero->hero['is_bg_grayscale'] ?? false,
])

@if ($isActive)
    <div class="{{ $isBgBlur ? 'backdrop-blur-sm' : 'backdrop-blur-0' }} {{ $bgOverlay }} {{ $isOverlayActive ? 'absolute' : 'hidden' }} -z-[30] m-auto w-full md:h-[480px] lg:h-[900px]"
        id="hero-fading-overlay">
    </div>
    @if ($isPatternBg)
        <div class="{{ $bgSize }} {{ $bgPosition }} {{ $bgRepeat }} bg-hero absolute -z-50 m-auto w-full bg-fixed opacity-20 filter transition-all duration-100 dark:opacity-20 dark:invert md:h-[480px] lg:h-[600px]"
            id="hero-background-image-pattern"
            style="background-image: url('{{ asset('img/core/core-ui-elements/patterns/' . $patternName . '.svg') }}')">
        </div>
    @elseif ($bgImage)
        <div class="{{ $bgSize }} {{ $bgPosition }} {{ $bgRepeat }} bg-hero {{ $isBgGrayscale ? 'filter grayscale' : 'filter-none grayscale-0' }} absolute -z-50 m-auto w-full bg-fixed transition-all duration-100 md:h-[480px] lg:h-[900px]"
            id="hero-background-image" style="background-image: url('{{ asset('storage/' . $bgImage) }}')">
        </div>
    @endif
@endif
