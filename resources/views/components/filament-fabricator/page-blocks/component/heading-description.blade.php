@props([

// Props to Layout Component
'is_active' => null,
'is_filled' => null,
'title' => null,
'subtitle' => null,
'is_centered' => null,
'button_header' => null,
'button_icon' => null,
'button_url' => null,
'is_heading_visible' => null,
'module_name' => null,
'is_section_filled_inverted' => null,
'with_padding' => false,

// Props for this Component

'featured_image_is_active' => null,
'featured_image' => null,
'description' => null,

])

@if ($is_active)
<x-core.layout :$button_header :$is_centered :$button_icon :$button_url :$is_heading_visible :$module_name :$is_filled
    :$is_section_filled_inverted :$title :$subtitle :$with_padding>
</x-core.layout>
@endif
