@props([
'cols' => '1',
'gap' => '4'
])

@php
// Convert to string to ensure match works properly
$cols = (string) $cols;

$gridClasses = match($cols) {
'1' => 'grid-cols-1',
'2' => 'grid-cols-1 md:grid-cols-2',
'3' => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3',
'4' => 'grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4',
default => 'grid-cols-1'
};
@endphp

<div {{ $attributes->merge(['class' => "grid {$gridClasses} gap-{$gap}"]) }}>
    {{ $slot }}
</div>
