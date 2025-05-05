@props([
'is_section_filled_inverted' => false,
'icon' => null,
'title' => null,
'subtitle' => null,
'is_centered' => false,
'button_header' => null,
'button_url' => null,
'is_visible' => true,
'is_heading_visible' => true,
])

@if($is_heading_visible)
@if ($title)
<div class="flex flex-col">
    <div class="{{ $button_header ? 'flex justify-between flex-initial' : '' }} py-4">
        <p class="dg header-title {{ $is_centered && !$button_header ? 'text-center' : 'text-left' }}">
            {{ $title }}
        </p>
        @if ($button_header)
        @if ($button_url)
        <a href="{{ $button_url }}">
            @endif
            <x-ui.button :$is_section_filled_inverted :$icon :style="'outlined'">
                {!! $button_header !!}
            </x-ui.button>
            @if ($button_url)
        </a>
        @endif
        @endif
    </div>
    @if ($subtitle)
    <div
        class="subtitle {{ $button_header ? 'text-left w-full -mt-2' : ($is_centered ? 'text-center max-w-4xl' : 'text-left w-full') }} mb-6 text-sm">
        {{ $subtitle }}
    </div>
    @endif
</div>
@endif
@endif
