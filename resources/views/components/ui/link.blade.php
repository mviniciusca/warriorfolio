@props(['href' => null, 'icon' => null, 'iconClass' => 'w-4 h-4', 'text' => null])

<a href="{{ $href }}">
    <span
        class="flex rounded-full opacity-50 hover:opacity-100 border border-transparent hover:saturn-border items-center gap-2 p-1.5 hover:saturn-bg-accent transition-all duration-300">
        @if($icon)
        <x-ui.ionicon :$icon class="w-4 h-4" />
        @endif
        <span class="text-xs">{{ __($text) }}</span>
    </span>
</a>
