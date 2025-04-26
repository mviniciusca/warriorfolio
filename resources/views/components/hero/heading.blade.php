@props(['hero'])

{{-- Info Bumper --}}
<x-ui.info-bumper :is_active="$hero->hero['bumper_is_active'] ?? null"
    :is_animated="$hero->hero['bumper_is_animated'] ?? null" :bumper_icon="$hero->hero['bumper_icon'] ?? null"
    :bumper_title="$hero->hero['bumper_title'] ?? null" :bumper_tag="$hero->hero['bumper_tag'] ?? null"
    :is_center="$hero->hero['bumper_is_center'] ?? null" :bumper_link="$hero->hero['bumper_link'] ?? null"
    :bumper_target="$hero->hero['bumper_target'] ?? null" :bumper_role="$hero->hero['bumper_role'] ?? null" />

{{-- Title --}}
@if ($hero->hero['section_title'] ?? false)
<h1
    class="animate__animated animate__fadeInUp animate my-2 text-2xl font-bold leading-none tracking-tight dark:text-white md:text-2xl xl:text-3xl hero-title {{ ($hero->hero['bg_image'] ?? null) && ($hero->hero['is_highlight'] ?? null) ? 'bg-white dark:bg-black px-2' : '' }}">
    {!! $hero->hero['section_title'] !!}
</h1>
@endif
@if ($hero->hero['section_subtitle'] ?? false)
<h2
    class="animate__animated animate__fadeInUp animate__delay-1s my-2 hero-subtitle leading-tight tracking-tight shadow-current {{ ($hero->hero['bg_image'] ?? null) && ($hero->hero['is_highlight'] ?? null) ? 'bg-white  dark:bg-black px-2 max-w-auto' : '' }}">
    {!! $hero->hero['section_subtitle'] !!}
</h2>
@endif
