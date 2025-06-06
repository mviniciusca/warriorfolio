@props([
'size' => 'w-10 h-10',
'animated' => true
])

<div {{ $attributes->merge([
    'class' => implode(' ', array_filter([
    $size,
    'saturn-bg-accent border saturn-border-accent rounded-full',
    $animated ? 'animate-pulse' : '',
    'flex items-center justify-center'
    ]))
    ]) }}>
    <svg class="w-4 h-4 saturn-text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
    </svg>
</div>
