@props(['title' => null, 'icon' => null])

<div class="border-b border-b-secondary-500 border-opacity-20 py-12">
    <h2 class="mb-5 flex items-center gap-1 text-xl font-semibold tracking-tighter">
        @if($icon != '')
        <span class="text-xl">
            <ion-icon name="{{ $icon }}"></ion-icon>
        </span>
        @endif
        <p>{{ __($title) }}</p>
    </h2>
    {{ $slot }}
</div>
