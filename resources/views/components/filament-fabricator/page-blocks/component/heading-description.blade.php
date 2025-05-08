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
'module_name' => null,
'with_padding' => false,
])

@if ($is_active)
<x-core.layout :$button_header :$is_centered :$button_icon :$button_url :$is_heading_visible :$module_name :$is_filled
    :$is_section_filled_inverted :$title :$subtitle :$with_padding>
</x-core.layout>
{{-- --}}

{{-- --}}
@endif
