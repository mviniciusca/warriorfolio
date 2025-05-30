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
'button_icon' => null ?? 'chevron-forward-outline',
'button_style' => null,
'button_url' => null,
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
// Layout Props
'container' => settings('design.container_width', 'max-w-7xl'),
'px_padding' => true,

])

<div class="{{ $with_padding ? 'py-4 md:py-8 lg:py-12' : 'py-0' }}
{{ $is_section_filled_inverted ? 'section-filled-inverse' : '' }}
 {{ $is_filled ? 'section-filled duration-300 transition-all' : '' }}
  {{ $px_padding ? 'px-4' : '' }}" id="{{ $module_name ?? 'section' . rand(1, 10) }}">
    <div class="{{ $container }} mx-auto">
        <div id="{{ $module_slug }}">
            {{-- Heading --}}
            @if($is_heading_visible)
            <div class="w-full flex items-center
                {{ $button_header ? 'justify-between' : ($is_centered ? 'justify-center' : 'justify-start') }} py-6">
                <div class="flex flex-col {{ $is_centered && !$button_header ? 'text-center' : 'text-left' }}">
                    @if($title)
                    <h2 class="text-2xl font-bold">{!! $title !!}</h2>
                    @endif
                    @if($subtitle)
                    <p class="text-sm mt-1">{!! $subtitle !!}</p>
                    @endif
                </div>
                @if($button_header)
                <div>
                    @if($button_url)
                    <a href="{{ $button_url }}">@endif
                        <x-ui.button :$button_style :$is_section_filled_inverted :icon="$button_icon"
                            :style="$button_style" :label="$button_header" />
                        @if($button_url)
                    </a>
                    @endif
                </div>
                @endif
            </div>
            @endif
            {{-- Content --}}
            {{ $slot }}
        </div>
    </div>
</div>
