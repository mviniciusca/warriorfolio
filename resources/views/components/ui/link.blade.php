@props(['href' => null, 'icon' => null, 'iconClass' => 'w-4 h-4', 'text' => null])

<a href="{{ $href }}">
    <span
        class="flex rounded-lg saturn-text saturn-bg hover:saturn-bg-accent hover:saturn-border-accent border border-transparent hover:saturn-border items-center gap-2 p-1.5">
        @if($icon)
        <x-ui.ionicon :$icon class="w-4 h-4" />
        @endif
        <span class="text-xs">{{ __($text) }}</span>
    </span>
</a>
