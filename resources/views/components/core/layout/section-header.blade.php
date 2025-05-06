@props([
// Button Component
'is_section_filled_inverted' => false,
'icon' => null ?? 'arrow-forward-sharp',

// Heading Component
'title' => null,
'subtitle' => null,
'is_centered' => false,
'button_header' => null,
'button_url' => null,
'is_visible' => true,
'is_heading_visible' => true,
])

@if($is_heading_visible)
<div
    class="w-full flex items-center {{ $button_header ? 'justify-between' : ($is_centered ? 'justify-center' : 'justify-start') }} py-6">
    <div class="flex flex-col {{ $is_centered && !$button_header ? 'text-center' : 'text-left' }}">
        @if($title)
        <h2 class="text-2xl font-bold">{{ $title }}</h2>
        @endif
        @if($subtitle)
        <p class="text-sm mt-1">{{ $subtitle }}</p>
        @endif
    </div>
    @if($button_header)
    <div>
        @if($button_url)
        <a href="{{ $button_url }}">@endif
            <x-ui.button :$is_section_filled_inverted :$icon style="outlined">
                {!! $button_header !!}
            </x-ui.button>
            @if($button_url)
        </a>
        @endif
    </div>
    @endif
</div>
@endif
