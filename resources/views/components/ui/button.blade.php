@props(['type' => 'button', 'icon' => 'chevron-forward-sharp', 'size' => 'sm', 'style' => 'filled'])

@if($style === 'filled')
<button type="{{ $type }}" {{ $attributes->class([
    'bg-black hover:bg-secondary-700 dark:hover:bg-secondary-200 transition-all duration-100 text-white dark:bg-white
    dark:text-black flex flex-wrap gap-2 border border-transparent py-2 px-4 text-sm rounded-md items-center'
    ])
    }}>
    <span>
        {{ $slot }}
    </span>
    @if ($icon)
    <x-ui.ionicon :icon='$icon' />
    @endif
</button>
@endif


@if($style === 'outlined')
<button type="{{ $type }}" {{ $attributes->class([
    'bg-white/15 hover:bg-black/5 hover:text-black dark:hover:text-white dark:hover:bg-white/10 transition-all
    duration-100 dark:bg-black/15 text-black dark:text-white flex flex-wrap gap-2 border border-black/50 py-2 px-4
    dark:border-white/50 text-sm rounded-md items-center'
    ])
    }}>
    <span>
        {{ $slot }}
    </span>
    @if ($icon)
    <x-ui.ionicon :icon='$icon' />
    @endif
</button>
@endif
