@props([
'fields' => 4,
'animated' => true,
'showLabels' => true,
'spacing' => 'space-y-4'
])

<div {{ $attributes->merge(['class' => $spacing]) }}>
    @for($i = 0; $i < $fields; $i++) <div class="space-y-2">
        @if($showLabels)
        <div class="h-2 bg-muted rounded w-16 {{ $animated ? 'animate-pulse' : '' }}"></div>
        @endif
        <div class="h-10 bg-muted rounded {{ $animated ? 'animate-pulse' : '' }}"></div>
</div>
@endfor

<!-- Submit button -->
<div class="pt-2">
    <x-ui.placeholder.button width="w-full" height="h-10" :animated="$animated" />
</div>
</div>
