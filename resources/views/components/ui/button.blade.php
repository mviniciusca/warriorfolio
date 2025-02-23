@props(['type' => 'button', 'icon' => 'chevron-forward-sharp', 'size' => 'sm'])

<button type="{{ $type }}"
    {{ $attributes->class([
        'btn inline-flex items-center gap-1 rounded-md bg-primary-700 text-center font-medium text-white transition-all duration-100 hover:opacity-90 focus:ring-4 focus:ring-primary-500 dark:focus:ring-primary-950',
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
