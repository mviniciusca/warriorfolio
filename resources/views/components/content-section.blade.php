@props([
    'title' => '',
    'class' => '',
    'icon' => '',
])
<div class="text-5xl font-bold text-zinc-500 lowercase tracking-tighter pt-32 pb-32 w-full flex gap-4 items-center justify-center">
<span class=""><ion-icon name="{{ $icon }}"></ion-icon></span>
<span class="">{{ $title }}</span>
</div>
<div class="px-4 py-4 md:py-8">
    <div class="max-w-7xl mx-auto {{ $class }}">
        {{ $slot }}
    </div>
<div>
