@props(['hero' => $data->layout ?? null, 'sliders'])

@if ($data->module->hero)
{{-- Hero Section Background --}}
<div class="{{ $hero->hero['is_upper'] ?? false ? '-mt-36' : 'mt-0' }}">
    <x-hero.background :hero='$hero' />
</div>
{{-- Hero Section --}}
<x-core.layout :is_filled="$hero->hero['is_filled'] ?? false" :module_name="'hero-section'" :with_padding="false">
    <section class="hero-section-section {{ $hero->hero['is_upper'] ?? false ? 'mt-44' : 'mt-0' }} py-8">
        <div
            class="{{ $hero->hero['bumper_is_center'] ?? false ? 'mx-auto flex flex-col items-center justify-center' : '' }}">
            @if ($hero->hero['theme'])
            @php
            $themeName = $hero->hero['theme'] ?? 'default';
            @endphp
            <x-dynamic-component :$hero :component="'themes.hero.' . $themeName . '-theme'" />
            @endif
            {{-- Hero Section Static Slider --}}
            <x-hero.static-slider :$hero />
            {{-- Hero Section Dynamic Slider --}}
            <x-hero.slider :$sliders />
        </div>
    </section>
</x-core.layout>
@endif
