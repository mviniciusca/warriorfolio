@props([
'title' => null,
'subtitle' => null,
'button_header' => null,
'button_url' => null,
'button_icon' => null,
'button_style' => 'primary',
'is_section_filled_inverted' => false,
'is_centered' => false,
'icon_before' => null,
])

@if($is_centered && $button_header)
<div class="w-full py-6">
    <div class="flex flex-col items-center text-center space-y-6">
        <div class="flex flex-col space-y-1">
            @if($title)
            <h2 class="text-2xl font-bold">{!! $title !!}</h2>
            @endif
            @if($subtitle)
            <p class="text-sm">{!! $subtitle !!}</p>
            @endif
        </div>
        <div class="flex justify-center">
            @if($button_url)
            <a href="{{ $button_url }}">@endif
                <x-ui.button :$icon_before :$button_style :$is_section_filled_inverted :icon="$button_icon"
                    :label="$button_header" />
                @if($button_url)
            </a>
            @endif
        </div>
    </div>
</div>
@else
<div class="w-full flex items-center
    {{ $button_header ? 'justify-between' : ($is_centered ? 'justify-center' : 'justify-start') }} py-6">
    <div class="flex flex-col {{ $is_centered && !$button_header ? 'text-center' : 'text-left' }}
        {{ $button_header ? 'pr-12' : '' }}">
        @if($title)
        <h2 class="text-2xl font-bold">{!! $title !!}</h2>
        @endif
        @if($subtitle)
        <p class="text-sm mt-1">{!! $subtitle !!}</p>
        @endif
    </div>
    @if($button_header)
    <div class="ml-12 flex-shrink-0">
        @if($button_url)
        <a href="{{ $button_url }}">@endif
            <x-ui.button :$icon_before :$button_style :$is_section_filled_inverted :icon="$button_icon"
                :label="$button_header" />
            @if($button_url)
        </a>
        @endif
    </div>
    @endif
</div>
@endif
