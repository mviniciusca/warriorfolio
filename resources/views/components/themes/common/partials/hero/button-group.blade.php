@props([
'class' => null,
'color' => false,
'icon' => null,
'size' => null,
'style' => null ?? 'filled',
'target' => '_self',
'title' => null,
'url' => null,
'icon_before' => true,
])

<div>
    @if ($style && $title)
    @if ($url)
    <a href="{{ $url }}" target="{{ $target }}">
        @endif
        <x-ui.button :$icon_before :$icon :$style class="{{ $class }}">
            {{ $title }}
        </x-ui.button>
        @if ($url)
    </a>
    @endif
    @endif
</div>
