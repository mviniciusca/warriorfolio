@props([
    'title' => '',
    'class' => ''
])
<div class="text-5xl font-bold text-zinc-500 text-center lowercase tracking-tighter pt-24 pb-24  w-full">{{ $title }}</div>
<div class="px-4 py-4 md:py-8">
    <div class="max-w-7xl mx-auto {{ $class }}">
        {{ $slot }}
    </div>
<div>
