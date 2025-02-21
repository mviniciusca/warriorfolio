@props(['type' => 'button', 'icon' => 'arrow-forward-outline'])

<button type="{{ $type }}"
    class="mt-4 inline-flex items-center gap-1 rounded-md bg-primary-700 px-3 py-3 text-center text-sm font-medium text-white transition-all duration-100 hover:opacity-90 focus:ring-4 focus:ring-primary-500 dark:focus:ring-primary-950">

    <span>
        {{ $slot }}
    </span>

    @if ($icon != 'none')
        <x-ui.ionicon :icon='$icon' />
    @endif

</button>
