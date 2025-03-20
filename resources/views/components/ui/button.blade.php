{{--

Usage:
<x-ui.button type="submit" style="filled" icon="chevron-forward-sharp">
    Submit
</x-ui.button>

Props:
- type: button|submit|reset
- icon: ionicon name
- style: filled|outlined
- is_section_filled_inverted: null|true|false

--}}

@props([
    'type' => 'button',
    'icon' => 'chevron-forward-sharp',
    'style' => 'filled',
    'is_section_filled_inverted' => null
])

{{-- Filled Button --}}
@if($style === 'filled' && !$is_section_filled_inverted)
    <button type="{{ $type }}" {{ $attributes->class(['bg-black hover:bg-secondary-700 text-sm dark:hover:bg-secondary-200
        transition-all duration-100 text-white dark:bg-white dark:text-black flex flex-wrap gap-2 border border-transparent
        py-2 px-4 rounded-md items-center'
        ]) }}>
        <span>
            {{ $slot }}
        </span>
        @if ($icon)
            <x-ui.ionicon :icon='$icon' />
        @endif
    </button>
@endif

{{-- Filled Button Inverted --}}
@if($style === 'filled' && $is_section_filled_inverted)
    <button type="{{ $type }}" {{ $attributes->class(['bg-white hover:bg-secondary-200 text-sm dark:hover:bg-black
        transition-all duration-100 text-black dark:bg-black dark:text-white flex flex-wrap gap-2 border border-black/50
        py-2 px-4 rounded-md items-center'
        ]) }}>
        <span>
            {{ $slot }}
        </span>
        @if ($icon)
            <x-ui.ionicon :icon='$icon' />
        @endif
    </button>
@endif

{{-- Outlined Button --}}
@if($style === 'outlined' && !$is_section_filled_inverted)
    <button type="{{ $type }}" {{ $attributes->class(['bg-white/15 hover:bg-black/5 text-sm hover:text-black
        dark:hover:text-white dark:hover:bg-white/5 transition-all duration-100 dark:bg-black/10 text-black dark:text-white
        flex flex-wrap gap-2 border border-black/50 py-2 px-4 dark:border-white/10 rounded-md items-center
        hover:bg-secondary-200/20 active:opacity-60'
        ])}}>
        <span>
            {{ $slot }}
        </span>
        @if ($icon)
            <x-ui.ionicon :icon='$icon' />
        @endif
    </button>
@endif

{{-- Outlined Button Inverted --}}
@if($style === 'outlined' && $is_section_filled_inverted)
    <button type="{{ $type }}" {{ $attributes->class(['bg-black/15 hover:bg-white/5 text-sm hover:text-black
        dark:hover:text-white dark:hover:bg-black/5 transition-all duration-100 dark:bg-white/10 text-black dark:text-white
        flex flex-wrap gap-2 border border-white/50 py-2 px-4 dark:border-black/50 rounded-md items-center
        hover:bg-secondary-200/20 active:opacity-60'
        ])}}>
        <span>
            {{ $slot }}
        </span>
        @if ($icon)
            <x-ui.ionicon :icon='$icon' />
        @endif
    </button>
@endif
