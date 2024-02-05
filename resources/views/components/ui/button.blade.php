@props(['type' => 'button', 'icon' => null])

<button type="{{ $type }}" {{ $attributes->merge(['class' =>
    'inline-flex items-center gap-1 text-sm
    rounded-lg bg-primary-700
    text-center font-medium text-white
    hover:bg-primary-800 focus:ring-4 focus:ring-primary-300
    dark:focus:ring-primary-900 hover:opacity-80
    transition-all duration-100']) }}
    >
    {{ $slot }}

    @if($icon)
    <x-ui.ionicon :icon='$icon' />
    @endif

</button>
