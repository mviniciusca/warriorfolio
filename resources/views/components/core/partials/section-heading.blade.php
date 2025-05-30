@props(['title' => null, 'subtitle' => null, 'button_header' => null, 'button_url' => null, 'button_icon' => null,
'button_style' => 'primary', 'is_section_filled_inverted' => false, 'is_centered' => false])

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
            <x-ui.button :$button_style :$is_section_filled_inverted :icon="$button_icon" :style="$button_style"
                :label="$button_header" />
            @if($button_url)
        </a>
        @endif
    </div>
    @endif
</div>
