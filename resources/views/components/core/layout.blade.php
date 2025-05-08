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
'button_style' => null,
'button_url' => null,
'is_centered' => null,
'is_heading_visible' => true,
'is_section_filled_inverted' => false,
'with_padding' => true,
'module_name' => null,
'is_filled' => false,
'style' => 'outlined',
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
            {{-- Heading --}}
            @if($is_heading_visible)
            <div
                class="w-full flex items-center {{ $button_header ? 'justify-between' : ($is_centered ? 'justify-center' : 'justify-start') }} py-6">
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
                        <x-ui.button :$button_style :$is_section_filled_inverted :icon="$button_icon" :$style
                            :label="$button_header" />
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
