@props([
    'wire' => false,
    'class' => 'flex rounded-full p-2 transition-all duration-200 hover:bg-zinc-200 hover:text-zinc-600 active:bg-zinc-300 active:text-zinc-900',
])
@if ($wire)
    <button class="{{ $class }}" wire:click="{{ $wire }}">
        {{ $slot }}
    </button>
@else
    <button class="{{ $class }}">
        {{ $slot }}
    </button>
@endif
