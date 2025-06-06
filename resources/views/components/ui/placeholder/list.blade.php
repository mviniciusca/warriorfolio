@props([
'items' => 3,
'animated' => true,
'showAvatar' => true,
'spacing' => 'space-y-4'
])

<div {{ $attributes->merge(['class' => $spacing]) }}>
    @for($i = 0; $i < $items; $i++) <div class="flex items-start gap-3">
        @if($showAvatar)
        <x-ui.placeholder.avatar size="w-8 h-8" :animated="$animated" />
        @endif

        <div class="flex-1 space-y-2">
            <div class="h-2 bg-muted rounded w-1/4 {{ $animated ? 'animate-pulse' : '' }}"></div>
            <div class="h-2 bg-muted rounded w-full {{ $animated ? 'animate-pulse' : '' }}"></div>
            <div class="h-2 bg-muted rounded w-3/4 {{ $animated ? 'animate-pulse' : '' }}"></div>
        </div>
</div>
@endfor
</div>
