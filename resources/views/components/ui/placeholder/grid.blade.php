@props([
'cols' => 3,
'rows' => 3,
'animated' => true,
'spacing' => 'gap-4'
])

<div {{ $attributes->merge([
    'class' => "grid grid-cols-{$cols} {$spacing}"
    ]) }}>
    @for($i = 0; $i < ($cols * $rows); $i++) <div class="space-y-3">
        <x-ui.placeholder.image height="h-32" :animated="$animated" />

        <div class="space-y-2">
            <div class="h-2 bg-muted rounded w-full {{ $animated ? 'animate-pulse' : '' }}"></div>
            <div class="h-2 bg-muted rounded w-3/4 {{ $animated ? 'animate-pulse' : '' }}"></div>
        </div>
</div>
@endfor
</div>
