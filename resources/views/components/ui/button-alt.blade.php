@props(['type' => 'button', 'icon' => null])

<button type="{{ $type }}" {{ $attributes->merge(['class' =>
    'border border-secondary-200 dark:border-secondary-700 text-sm
    inline-flex items-center gap-1 bg-opacity-50
    rounded-lg bg-white dark:bg-secondary-700 dark:bg-opacity-50
    text-center font-medium text-primary-500 dark:text-white
    hover:bg-primary-50 focus:ring-4 focus:ring-primary-300
    dark:focus:ring-primary-900 hover:opacity-80
    transition-all duration-100']) }}
    >
    {{ $slot }}

    @if($icon)
    <x-ui.ionicon :icon='$icon' />
    @endif

</button>
