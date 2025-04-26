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
- size: default|sm (small)

--}}

@props([
'type' => 'button',
'icon' => null,
'style' => 'filled',
'color' => false,
'is_section_filled_inverted' => null,
'iconBefore' => false,
'size' => 'sm', // sm, default
])

{{-- Filled with Color Primary bg-primary-600 text-white Button --}}
@if ($style === 'filled' && $color)
<button {{ $attributes->class([
    'bg-primary-600 hover:bg-primary-700 dark:hover:bg-primary-500
    transition-all duration-300 text-white dark:bg-primary-700 dark:text-white flex flex-wrap gap-2 border
    border-transparent rounded-md items-center justify-center active:opacity-30',
    'text-sm md:text-base py-2 px-4' => $size === 'default',
    'text-xs py-1.5 px-3' => $size === 'sm',
    ]) }}
    type="{{ $type }}">
    @if ($icon && $iconBefore)
    <x-ui.ionicon :icon='$icon' />
    @endif
    <span>
        {{ $slot }}
    </span>
    @if ($icon && !$iconBefore)
    <x-ui.ionicon :icon='$icon' />
    @endif
</button>
@endif

{{-- Outlined with Color Primary bg-primary-600 text-white Button --}}
@if ($style === 'outlined' && $color)
<button {{ $attributes->class([
    'bg-primary-600/15 hover:bg-primary-700/20 hover:text-white
    dark:hover:text-white dark:hover:bg-primary-500/20 transition-all duration-300 dark:bg-primary-700/20 text-white
    dark:text-white flex flex-wrap gap-2 border border-primary-600/50 dark:border-primary-700/50 rounded-md
    items-center hover:bg-primary-700/20 active:opacity-30 justify-center',
    'text-sm md:text-base py-2 px-4' => $size === 'default',
    'text-xs py-1.5 px-3' => $size === 'sm',
    ]) }}
    type="{{ $type }}">
    @if ($icon && $iconBefore)
    <x-ui.ionicon :icon='$icon' />
    @endif
    <span>
        {{ $slot }}
    </span>
    @if ($icon && !$iconBefore)
    <x-ui.ionicon :icon='$icon' />
    @endif
</button>
@endif

{{-- Filled Button --}}
@if ($style === 'filled' && !$is_section_filled_inverted && !$color)
<button {{ $attributes->class([
    'bg-black hover:bg-secondary-700 dark:hover:bg-secondary-200 transition-all duration-300
    text-white dark:bg-white dark:text-black flex flex-wrap gap-2 border border-transparent rounded-md
    items-center active:opacity-30 justify-center',
    'text-sm md:text-base py-2 px-4' => $size === 'default',
    'text-xs py-1.5 px-3' => $size === 'sm',
    ]) }}
    type="{{ $type }}">
    @if ($icon && $iconBefore)
    <x-ui.ionicon :icon='$icon' />
    @endif
    <span>
        {{ $slot }}
    </span>
    @if ($icon && !$iconBefore)
    <x-ui.ionicon :icon='$icon' />
    @endif
</button>
@endif

{{-- Filled Button Inverted --}}
@if ($style === 'filled' && $is_section_filled_inverted && !$color)
<button {{ $attributes->class([
    'bg-white hover:bg-secondary-200 dark:hover:bg-black
    transition-all duration-300 text-black dark:bg-black dark:text-white flex flex-wrap gap-2 border border-black/50
    rounded-md items-center active:opacity-30 justify-center',
    'text-sm md:text-base py-2 px-4' => $size === 'default',
    'text-xs py-1.5 px-3' => $size === 'sm',
    ]) }}
    type="{{ $type }}">
    @if ($icon && $iconBefore)
    <x-ui.ionicon :icon='$icon' />
    @endif
    <span>
        {{ $slot }}
    </span>
    @if ($icon && !$iconBefore)
    <x-ui.ionicon :icon='$icon' />
    @endif
</button>
@endif

{{-- Outlined Button --}}
@if ($style === 'outlined' && !$is_section_filled_inverted && !$color)
<button {{ $attributes->class([
    'bg-white/15 hover:bg-black/5 hover:text-black
    dark:hover:text-white dark:hover:bg-white/5 transition-all duration-300 dark:bg-black/10 text-black dark:text-white
    flex flex-wrap gap-2 border border-black/50 dark:border-white/10 rounded-md items-center
    hover:bg-secondary-200/20 active:opacity-30 justify-center',
    'text-sm md:text-base py-2 px-4' => $size === 'default',
    'text-xs py-1.5 px-3' => $size === 'sm',
    ]) }}
    type="{{ $type }}">
    @if ($icon && $iconBefore)
    <x-ui.ionicon :icon='$icon' />
    @endif
    <span>
        {{ $slot }}
    </span>
    @if ($icon && !$iconBefore)
    <x-ui.ionicon :icon='$icon' />
    @endif
</button>
@endif

{{-- Outlined Button Inverted --}}
@if ($style === 'outlined' && $is_section_filled_inverted && !$color)
<button {{ $attributes->class([
    'bg-black/15 hover:bg-white/5 hover:text-white
    dark:hover:text-black dark:hover:bg-black/5 transition-all duration-300 dark:bg-white/10 text-white
    dark:text-black flex flex-wrap gap-2 border border-white/10 dark:border-black/10 rounded-md
    items-center hover:bg-secondary-200/20 active:opacity-30 justify-center',
    'text-sm md:text-base py-2 px-4' => $size === 'default',
    'text-xs py-1.5 px-3' => $size === 'sm',
    ]) }}
    type="{{ $type }}">
    @if ($icon && $iconBefore)
    <x-ui.ionicon :icon='$icon' />
    @endif
    <span>
        {{ $slot }}
    </span>
    @if ($icon && !$iconBefore)
    <x-ui.ionicon :icon='$icon' />
    @endif
</button>
@endif
