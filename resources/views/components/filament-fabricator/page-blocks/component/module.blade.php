@aware(['page'])
@props([
'is_active' => true,
'module_name' => null,
'title' => null,
'subtitle' => null,
'tailwind_css_attributes' => null,
'slug' => null,
])


@if($is_active)
<section class="{{ $tailwind_css_attributes }}" id="{{ $slug }}">
    @if($title)
    <div class="header-title">
        {!! $title !!}
    </div>
    @endif
    @if($subtitle)
    <div class="subtitle mt-2 text-center text-xl">
        {!! $subtitle !!}
    </div>
    @endif
</section>
@endif
