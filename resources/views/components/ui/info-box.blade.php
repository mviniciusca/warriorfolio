@props(['title' => null, 'icon' => null])

<div class="border-b border-b-secondary-600 border-opacity-30 py-8">
    <h2 class="mb-2 flex items-center gap-1 text-xl font-semibold tracking-tighter">
        @if($icon != '')
        <span class="text-xl">
            <ion-icon name="{{ $icon }}"></ion-icon>
        </span>
        @endif
        <p class="mb-2">{{ __($title) }}</p>
    </h2>
    {{ $slot }}
</div>
