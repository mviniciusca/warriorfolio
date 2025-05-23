@if ($hero->is_active)
{{-- Hero Section Background --}}
<div class="{{ $hero->content['is_upper'] ?? false ? '-mt-36' : 'mt-0' }}">
    <x-themes.common.partials.hero.background :hero='$hero' />
</div>
{{-- Hero Section --}}
<x-core.layout :is_filled="$hero->hero['is_filled'] ?? false" :module_name="'hero-section'" :with_padding="false">
    <section class="hero-section-section {{ $hero->content['is_upper'] ?? false ? 'mt-44' : 'mt-0' }} py-8">
        <div
            class="{{ $hero->hero['bumper_is_center'] ?? false ? 'mx-auto flex flex-col items-center justify-center' : '' }}">
            @if ($hero->content['theme'])
            @php
            $themeName = $hero->content['theme'] ?? 'default';
            @endphp
            <x-dynamic-component :$hero :component="'themes.hero.' . $themeName . '-theme'" />
            @endif
            {{-- Hero Section Static Slider --}}
            <x-themes.common.partials.hero.static-slider :$hero />
        </div>
    </section>
</x-core.layout>
@endif
