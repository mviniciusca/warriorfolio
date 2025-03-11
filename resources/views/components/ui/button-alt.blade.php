{{-- Deprecated: Use the Button component and pass the style as a parameter. Set as "outlined" --}}

@props(['type' => 'button', 'icon' => 'chevron-forward-sharp', 'size' => 'sm'])

<button type="{{ $type }}" {{ $attributes->class([
    'inline-flex items-center gap-1 rounded-lg border border-secondary-200 text-secondary-700 bg-white bg-opacity-50 p-3
    text-center text-sm font-medium transition-all duration-100 hover:bg-secondary-50 hover:opacity-80 focus:ring-4
    focus:ring-primary-300 dark:border-secondary-700 dark:bg-secondary-700 dark:bg-opacity-50 dark:text-white
    dark:focus:ring-primary-900',
    'px-2 py-1 text-xs' => $size === 'xs',
    'p-2 text-sm' => $size !== 'xs',
    ]) }}>

    <span>
        {{ $slot }}
    </span>

    @if ($icon)
    <x-ui.ionicon :icon='$icon' />
    @endif

</button>
