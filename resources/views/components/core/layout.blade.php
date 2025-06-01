{{--

Core > View: Default Layout
----------------------------------------------------------------
This is the default layout component for the website. Used for website and components.
-------------------------------------------------------------------

--}}

@aware(['page'])
@props([
// Section Header Props
'button_header' => null,
'button_icon' => null,
'button_style' => null,
'button_url' => null,
'icon_before' => null,
'is_centered' => null,
'is_filled' => false,
'is_heading_visible' => false,
'is_section_filled_inverted' => false,
'module_name' => null,
'module_slug' => null ?? 'section' . rand(1, 10),
'style' => 'outlined',
'subtitle' => null,
'title' => null,
'with_padding' => true,
'no_padding' => false,
// Layout Props
'container' => settings('design.container_width', 'max-w-7xl'),
'px_padding' => true,
])

<div class="{{ $no_padding ? 'py-0' : ($with_padding ? 'saturn-y-section' : ($is_heading_visible ? 'pb-16' : 'py-6')) }}
{{ $is_section_filled_inverted ? 'saturn-bg-inverse saturn-text-inverse' : '' }}
 {{ $is_filled ? 'saturn-bg-accent duration-300 transition-all' : '' }}
  {{ $px_padding ? 'saturn-x-section' : '' }}" id="{{ $module_name ?? '' }}">
    <div class="{{ $container }} mx-auto">
        <div id="{{ $module_slug }}">
            {{-- Heading --}}
            @if($is_heading_visible)
            <x-core.partials.section-heading :$icon_before :$is_section_filled_inverted :$title :$subtitle
                :$button_header :$button_icon :$button_style :$button_url :$is_centered :$is_filled />
            @endif
            {{-- Content --}}
            {{ $slot }}
        </div>
    </div>
</div>
