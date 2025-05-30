@aware(['page'])
@props([
'is_active' => true,
'module_name' => null,
'title' => null,
'with_padding' => false,
'subtitle' => null,
'tailwind_css_attributes' => null,
'slug' => null,
])

@if ($is_active)
<x-core.layout :$with_padding id="{{ $slug }}" class="{{ $tailwind_css_attributes }}">

    @if ($title)
    <x-slot name="module_title">
        {!! $title !!}
    </x-slot>
    @endif

    @if ($subtitle)
    <x-slot name="module_subtitle">
        {!! $subtitle !!}
    </x-slot>
    @endif

</x-core.layout>
@endif
