@props(['hero'])

{{-- Info Bumper --}}
<x-ui.info-bumper :is_active="$hero->content['bumper_is_active'] ?? null"
    :is_animated="$hero->content['bumper_is_animated'] ?? null" :bumper_icon="$hero->content['bumper_icon'] ?? null"
    :bumper_title="$hero->content['bumper_title'] ?? null" :bumper_tag="$hero->content['bumper_tag'] ?? null"
    :is_center="$hero->content['bumper_is_center'] ?? null" :bumper_link="$hero->content['bumper_link'] ?? null"
    :bumper_target="$hero->content['bumper_target'] ?? null" :bumper_role="$hero->content['bumper_role'] ?? null" />

{{-- Title --}}
@if ($hero->content['section_title'] ?? false)
<h1
    class="animate__animated animate__fadeInUp animate text-2xl font-bold leading-tight tracking-tighter sm:text-3xl md:text-4xl lg:leading-[1.1]
    {{ ($hero->content['bg_image'] ?? null) && ($hero->content['is_highlight'] ?? null) ? 'saturn-bg saturn-text-inverse px-2' : '' }}">
    {!! $hero->content['section_title'] !!}
</h1>
@endif
@if ($hero->content['section_subtitle'] ?? false)
<h2
    class="animate__animated animate__fadeInUp animate__delay-1s my-2 hero-subtitle leading-tight tracking-tight shadow-current {{ ($hero->content['bg_image'] ?? null) && ($hero->content['is_highlight'] ?? null) ? 'saturn-bg px-2 max-w-auto' : '' }}">
    {!! $hero->content['section_subtitle'] !!}
</h2>
@endif
