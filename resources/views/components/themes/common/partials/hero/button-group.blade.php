@props([
'class' => null,
'color' => false,
'icon' => null,
'size' => null,
'style' => null ?? 'filled',
'target' => '_self',
'title' => null,
'url' => null,
])

<div>
    {{-- Filled Button --}}
    @if ($style === 'filled' && $title)
    @if ($url)
    <a href="{{ $url }}" target="{{ $target }}">
        @endif
        <x-ui.button :$color :$icon :style="'filled'" class="{{ $class }}">
            {{ $title }}
        </x-ui.button>
        @if ($url)
    </a>
    @endif
    @endif

    {{-- Outlined Button --}}
    @if ($style === 'outlined' && $title)
    @if ($url)
    <a href="{{ $url }}" target="{{ $target }}">
        @endif
        <x-ui.button :$color :$icon :style="'outlined'" class="{{ $class }}">
            {{ $title }}
        </x-ui.button>
        @if ($url)
    </a>
    @endif
    @endif
</div>
