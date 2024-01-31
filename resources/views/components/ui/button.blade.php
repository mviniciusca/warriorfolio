@props(['type' => 'button', 'icon' => null])

<button type="{{ $type }}"
    class="my-4 inline-flex items-center gap-1 rounded-lg bg-primary-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
    {{ $slot }}
    @if($icon)
    <ion-icon name="{{ $icon }}"></ion-icon>
    @endif
</button>
