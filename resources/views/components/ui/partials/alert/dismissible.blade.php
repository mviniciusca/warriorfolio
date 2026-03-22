@props([
    'is_dismissible' => false,
    'button_text' => null,
])

@if ($is_dismissible)
    @if (filled($button_text))
        <x-ui.button type="button" style="outlined" wire:click="close"
            {{ $attributes->class(['!h-8 min-h-8 shrink-0 px-3 py-0 text-xs font-medium']) }}>
            <span class="leading-none">{!! $button_text !!}</span>
        </x-ui.button>
    @else
        <button type="button" wire:click="close"
            {{ $attributes->class([
                'inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-md saturn-transition',
                'saturn-text-accent hover:bg-saturn-light-accent dark:hover:bg-saturn-dark-accent',
                'focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-primary-500/40 dark:focus-visible:ring-primary-400/35',
            ]) }}
            aria-label="{{ __('Dismiss') }}">
            <x-ui.ionicon class="h-4 w-4 shrink-0" icon="close-outline" />
        </button>
    @endif
@endif
