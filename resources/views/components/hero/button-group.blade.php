@props([
'title' => null,
'url' => null,
'icon' => null,
'style' => 'filled',
'target' => '_self',
'class' => null,
])

<div>
    {{-- Filled Button --}}
    @if($style === 'filled' && $title)
    @if ($url)
    <a target="{{ $target }}" href="{{ $url }}">
        @endif
        <x-ui.button :icon="$icon" :style="'filled'" class="{{ $class }}">
            {{ $title }}
        </x-ui.button>
        @if ($url)
    </a>
    @endif
    @endif

    {{-- Outlined Button --}}
    @if($style === 'outlined' && $title)
    @if ($url)
    <a target="{{ $target }}" href="{{ $url }}">
        @endif
        <x-ui.button :icon="$icon" :style="'outlined'" class="{{ $class }}">
            {{ $title }}
        </x-ui.button>
        @if ($url)
    </a>
    @endif
    @endif
</div>
