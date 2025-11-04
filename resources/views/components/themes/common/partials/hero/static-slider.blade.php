@props(['hero'])

@if (($hero->content['slider_content'] ?? false) && ($hero->content['slider_is_active'] ?? false))
@if ($hero->content['is_marquee'] ?? false)
@php
$speed = $hero->content['marquee_speed'] ?? 'normal';
$direction = $hero->content['marquee_direction'] ?? 'left';

// Map speed to autoplay delay (milliseconds between transitions)
$autoplayDelay = 0; // Continuous movement
switch($speed) {
case 'slow':
$autoplaySpeed = 1; // Very slow speed
break;
case 'fast':
$autoplaySpeed = 3; // Faster speed
break;
default:
$autoplaySpeed = 2; // Normal speed
break;
}
@endphp

{{-- Marquee Style --}}
<div class="w-full mt-24 animate__animated animate__fadeInUp animate__delay-1s">
    <div class="hero-logos-swiper" data-speed="{{ $autoplaySpeed }}" data-direction="{{ $direction }}"
        data-autoplay-delay="{{ $autoplayDelay }}">
        <div class="swiper-wrapper">
            {{-- First set of logos --}}
            @foreach ($hero->content['slider_content'] as $item)
            <div class="swiper-slide">
                <img class="{{ $hero->content['is_invert'] ? 'dark:invert' : null }} h-6 w-6 sm:h-8 sm:w-8 md:h-10 md:w-10 lg:h-12 lg:w-12 object-contain opacity-80 transition-all duration-200 hover:opacity-100"
                    src="{{ asset('storage/' . $item['slider_image']) }}" alt="Logo" />
            </div>
            @endforeach
            {{-- Duplicate for seamless loop --}}
            @foreach ($hero->content['slider_content'] as $item)
            <div class="swiper-slide">
                @isset($item['slider_image'])
                <img class="{{ $hero->content['is_invert'] ? 'dark:invert' : null }} h-6 w-6 sm:h-8 sm:w-8 md:h-10 md:w-10 lg:h-12 lg:w-12 object-contain opacity-80 transition-all duration-200 hover:opacity-100"
                    src="{{ asset('storage/' . $item['slider_image']) }}" alt="Logo" />
                @endisset
            </div>
            @endforeach
        </div>
    </div>
</div>
@else
{{-- Static Style --}}
<div
    class="w-full mt-24 animate__animated animate__fadeInUp animate__delay-1s flex flex-wrap justify-between items-center gap-3">
    @foreach ($hero->content['slider_content'] as $item)
    @isset($item['slider_image'])
    <img class="{{ $hero->content['is_invert'] ? 'dark:invert' : null }} h-6 w-6 sm:h-8 sm:w-8 md:h-10 md:w-10 lg:h-12 lg:w-12 object-contain opacity-80 transition-all duration-200 hover:opacity-100 flex-shrink-0"
        src="{{ asset('storage/' . $item['slider_image']) }}" alt="Logo" />
    @endisset
    @endforeach
</div>
@endif
@endif
