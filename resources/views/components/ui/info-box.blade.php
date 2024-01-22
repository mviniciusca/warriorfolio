@props(['title', 'icon' => ''])
<div class="py-12 border-b border-b-secondary-500 border-opacity-20">
    <h2 class="text-xl flex gap-1 items-center font-semibold tracking-tighter mb-5">
        @if($icon != '')
        <span class="text-xl">
            <ion-icon name="{{ $icon }}"></ion-icon>
        </span>
        @endif
        <p>{{ $title }}</p>
    </h2>
    {{ $slot }}
</div>
