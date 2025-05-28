@props([
'hero' => null,
'module_name' => 'hero-section',
'with_padding' => false,
'is_active' => $hero->is_active ?? false,
'is_upper' => $hero->content['is_upper'] ?? false,
'theme' => $hero->content['theme'] ?? 'default',
'bumper_is_center' => $hero->hero['bumper_is_center'] ?? false,
'is_filled' => $hero->content['is_filled'] ?? false,
])

@if ($hero && $is_active)
{{-- Hero Section Background --}}
<div class="{{ $is_upper ? '-mt-36' : 'mt-0' }}">
    <x-themes.common.partials.hero.background :$hero />
</div>
{{-- Hero Section --}}
<x-core.layout :is_heading_visible="false" :with_padding="false" :$module_name :$is_filled>
    <section class="hero-section py-8 {{ $is_upper ? 'mt-44' : 'mt-0' }}">
        <div class="{{ $bumper_is_center ? 'mx-auto flex flex-col items-center justify-center' : '' }}">
            @if ($theme)
            <x-dynamic-component :$hero :component="'themes.hero.' . $theme . '-theme'" />
            @endif
            {{-- Hero Section Static Slider --}}
            <x-themes.common.partials.hero.static-slider :$hero />
        </div>
    </section>
</x-core.layout>
@endif
