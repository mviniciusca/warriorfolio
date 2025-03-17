@props(['hero', 'sliders'])

{{-- Core Module: Hero Section --}}
@if ($module->hero)
    {{-- Hero Section Background --}}
    <x-hero.background :hero='$hero' />
    {{-- Hero Section --}}
    <x-core.layout :module_name="'hero-section'" :with_padding="false" :is_filled="$hero->hero['is_filled'] ?? false">
        <section class="hero-section-section py-8">
            <div class="{{ ($hero->hero['bumper_is_center'] ?? false) ?
            'mx-auto flex flex-col items-center justify-center' : ''}}">
                {{-- Theme --}}
                @if ($hero->hero['theme'])
                        @php
                            $themeName = $hero->hero['theme'] ?? 'default';
                        @endphp
                        <x-dynamic-component :component="'themes.hero.' . $themeName . '-theme'" :$hero />
                @endif
                {{-- Block: Static Slider --}}
                <x-hero.static-slider :$hero />
                {{-- Core: Dynamic Slider --}}
                <x-hero.slider :$sliders />
            </div>
        </section>
    </x-core.layout>
@endif
