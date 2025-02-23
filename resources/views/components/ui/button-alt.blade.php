@props(['type' => 'button', 'icon' => null])

<button type="{{ $type }}"
    class="inline-flex items-center gap-1 rounded-lg border border-secondary-200 bg-white bg-opacity-50 p-3 text-center text-sm font-medium text-primary-500 transition-all duration-100 hover:bg-primary-50 hover:opacity-80 focus:ring-4 focus:ring-primary-300 dark:border-secondary-700 dark:bg-secondary-700 dark:bg-opacity-50 dark:text-white dark:focus:ring-primary-900">

    <span>
        {{ $slot }}
    </span>

    @if ($icon)
        <x-ui.ionicon :icon='$icon' />
    @endif

</button>
