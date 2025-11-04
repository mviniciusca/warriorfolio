@props([
'lines' => 3,
'width' => 'w-full',
'animated' => true
])

<div {{ $attributes->merge(['class' => 'space-y-3']) }}>
    @for($i = 0; $i < $lines; $i++) <div class="h-2 saturn-bg-accent border saturn-border-accent rounded {{ $width }} {{ $animated ? 'animate-pulse' : '' }}
                    {{ $i === $lines - 1 ? 'w-3/4' : '' }}">
</div>
@endfor
</div>
