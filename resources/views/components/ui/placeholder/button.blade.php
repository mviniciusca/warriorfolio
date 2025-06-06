@props([
'width' => 'w-24',
'height' => 'h-8',
'animated' => true,
'rounded' => 'rounded'
])

<div {{ $attributes->merge([
    'class' => implode(' ', array_filter([
    $width,
    $height,
    'saturn-bg-accent border saturn-border-accent',
    $rounded,
    $animated ? 'animate-pulse' : ''
    ]))
    ]) }}>
</div>
