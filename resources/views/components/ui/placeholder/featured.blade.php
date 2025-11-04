@props([
'animated' => true,
'showImage' => true
])

<div {{ $attributes->merge(['class' => 'space-y-6']) }}>
    @if($showImage)
    <x-ui.placeholder.image class="aspect-[16/9]" :animated="$animated" />
    @endif

    <div class="space-y-4">
        <!-- Category -->
        <div class="h-2 bg-muted rounded w-24 {{ $animated ? 'animate-pulse' : '' }}"></div>

        <!-- Title -->
        <div class="space-y-3">
            <div class="h-4 bg-muted rounded w-full {{ $animated ? 'animate-pulse' : '' }}"></div>
            <div class="h-4 bg-muted rounded w-4/5 {{ $animated ? 'animate-pulse' : '' }}"></div>
        </div>

        <!-- Excerpt -->
        <div class="space-y-2">
            <div class="h-3 bg-muted rounded w-full {{ $animated ? 'animate-pulse' : '' }}"></div>
            <div class="h-3 bg-muted rounded w-5/6 {{ $animated ? 'animate-pulse' : '' }}"></div>
            <div class="h-3 bg-muted rounded w-4/5 {{ $animated ? 'animate-pulse' : '' }}"></div>
            <div class="h-3 bg-muted rounded w-3/4 {{ $animated ? 'animate-pulse' : '' }}"></div>
        </div>

        <!-- Meta info -->
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-3">
                <x-ui.placeholder.avatar size="w-8 h-8" :animated="$animated" />
                <div class="space-y-1">
                    <div class="h-2 bg-muted rounded w-20 {{ $animated ? 'animate-pulse' : '' }}"></div>
                    <div class="h-2 bg-muted rounded w-24 {{ $animated ? 'animate-pulse' : '' }}"></div>
                </div>
            </div>

            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-muted rounded {{ $animated ? 'animate-pulse' : '' }}"></div>
                <div class="w-8 h-8 bg-muted rounded {{ $animated ? 'animate-pulse' : '' }}"></div>
            </div>
        </div>
    </div>
</div>
