{{--

Core > View: Default Layout
----------------------------------------------------------------
This is the default layout component for the website. Used for website and components.
-------------------------------------------------------------------

--}}

@aware(['page'])
@props([

// Section Header Props
'title' => null,
'subtitle' => null,
'button_icon' => null ?? 'chevron-forward-outline',
'button_header' => null,
'button_url' => null,
'is_centered' => null,
'is_heading_visible' => true,
'is_section_filled_inverted' => false,
'with_padding' => true,
'module_name' => null,
'is_filled' => false,
'module_slug' => null ?? 'section' . rand(1, 10),

// Layout Props
'container' => settings('design.container_width', 'max-w-7xl'),
'px_padding' => true,

])

<div class="{{ $with_padding ? 'py-12 md:py-16 lg:py-20' : 'py-0' }}
{{ $is_section_filled_inverted ? 'section-filled-inverse' : '' }}
 {{ $is_filled ? 'section-filled duration-300 transition-all' : '' }}
  {{ $px_padding ? 'px-4' : '' }}" id="{{ $module_name ?? 'section' . rand(1, 10) }}">
    <div class="{{ $container }} mx-auto">
        <div id="{{ $module_slug }}">
            <x-core.layout.section-header :$button_header :$button_icon :$is_heading_visible :$button_url :$is_centered
                :$title :$subtitle :$is_section_filled_inverted />
            {!! $slot !!}
        </div>
    </div>
</div>
