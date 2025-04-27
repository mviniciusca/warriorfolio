@props(['icon' => null])

@if ($icon)
<ion-icon {{ $attributes->merge(['class' => 'h-5 w-5']) }} wire:ignore name="{{ $icon }}"> </ion-icon>
@endif
