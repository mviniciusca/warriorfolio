<div>
    {{-- Filled Button --}}
    @if($style === 'filled' && $title)
    @if ($url)
    <a target="{{ $target }}" href="{{ $url }}">
        @endif
        <x-ui.button :icon="$icon" :style="'filled'">
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
        <x-ui.button :icon="$icon" :style="'outlined'">
            {{ $title }}
        </x-ui.button>
        @if ($url)
    </a>
    @endif
    @endif
</div>
