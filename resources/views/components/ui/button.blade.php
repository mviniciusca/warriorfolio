@props(['type' => 'button', 'icon' => null])

<button type="{{ $type }}"
    class="mt-4 inline-flex items-center gap-1 rounded-md bg-primary-700 p-3 text-center text-sm font-medium text-white transition-all duration-100 hover:opacity-90 focus:ring-4 focus:ring-primary-500 dark:focus:ring-primary-950">

    <span>
        {{ $slot }}
    </span>

    @if ($icon)
        <x-ui.ionicon :icon='$icon' />
    @endif

</button>
