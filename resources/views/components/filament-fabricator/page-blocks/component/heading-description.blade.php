@props([

// Props to Layout Component
'is_active' => null,
'is_filled' => null,
'is_section_filled_inverted' => null,
'is_heading_visible' => null,
'title' => null,
'subtitle' => null,
'is_centered' => null,
'button_header' => null,
'button_icon' => null,
'button_url' => null,
'button_style' => null,
'module_name' => null,
'with_padding' => false,
])


@php
$processedButtonHeader = $button_header ? new Illuminate\Support\HtmlString($button_header) : null;
@endphp

@if ($is_active)
<x-core.layout :$is_centered :$module_name :$is_filled :$is_section_filled_inverted :$button_icon :$with_padding :$title
    :$subtitle :$is_heading_visible :$button_style :button_header="$processedButtonHeader">
</x-core.layout>
@endif
