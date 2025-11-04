@props(['icon' => null, 'size' => 'md'])

@php
$sizeClasses = [
'xs' => 'h-3 w-3',
'sm' => 'h-4 w-4',
'md' => 'h-5 w-5',
'lg' => 'h-6 w-6',
'xl' => 'h-8 w-8',
'2xl' => 'h-10 w-10',
'3xl' => 'h-12 w-12',
];

$iconSize = $sizeClasses[$size] ?? $sizeClasses['md'];
@endphp

@if ($icon)
<ion-icon {{ $attributes->merge(['class' => $iconSize]) }} wire:ignore name="{{ $icon }}"> </ion-icon>
@endif
