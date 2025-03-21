{{--

Core Component: Hero Section
----------------------------------------------------------------
This component is responsible for rendering the hero section of the website.
It includes the hero section background, static and dyn. sliders and the hero section itself.
-------------------------------------------------------------------
Data:
App\View\Components\Hero\Section.php

--}}
@props(['hero', 'sliders'])

@if ($module->hero)
    {{-- Hero Section Background --}}
    <div class="{{ ($hero->hero['is_upper'] ?? false) ? '-mt-36' : 'mt-0' }}">
        <x-hero.background :hero='$hero' />
    </div>
    {{-- Hero Section --}}
    <x-core.layout :module_name="'hero-section'" :with_padding="false" :is_filled="$hero->hero['is_filled'] ?? false">
        <section class="hero-section-section py-8 {{ $hero->hero['is_upper'] ?? false ? 'mt-44' : 'mt-0' }}">
            <div
                class="{{ $hero->hero['bumper_is_center'] ?? false ? 'mx-auto flex flex-col items-center justify-center' : '' }}">
                @if ($hero->hero['theme'])
                        @php
                            $themeName = $hero->hero['theme'] ?? 'default';
                        @endphp
                        <x-dynamic-component :component="'themes.hero.' . $themeName . '-theme'" :$hero />
                @endif
                {{-- Hero Section Static Slider --}}
                <x-hero.static-slider :$hero />
                {{-- Hero Section Dynamic Slider --}}
                <x-hero.slider :$sliders />
            </div>
        </section>
    </x-core.layout>
@endif
