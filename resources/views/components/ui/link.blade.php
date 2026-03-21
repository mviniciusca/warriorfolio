@props(['href' => null, 'icon' => null, 'iconClass' => 'w-4 h-4', 'text' => null, 'badge' => null])

<a href="{{ $href }}" class="block">
    <span
        class="flex min-h-[2.25rem] w-full items-center justify-between gap-2 rounded-lg border border-transparent p-2 saturn-bg saturn-text transition-colors hover:saturn-bg-accent hover:saturn-border">
        <span class="flex min-w-0 flex-1 items-center gap-2">
            @if ($icon)
                <x-ui.ionicon :$icon class="h-4 w-4 shrink-0 opacity-80" />
            @endif
            <span class="truncate text-xs font-medium">{{ __($text) }}</span>
        </span>
        @if (filled($badge))
            <span class="saturn-badge-neutral min-w-[1.25rem] shrink-0 justify-center tabular-nums">
                {{ $badge }}
            </span>
        @endif
    </span>
</a>
