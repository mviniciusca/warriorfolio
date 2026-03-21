@props([
'buttonText' => null,
'buttonIcon' => null ?? 'mail-outline',
'is_section_filled_inverted' => false,
])
<div>
    <form class="grid items-center gap-3" wire:submit="create">
        <div>
            <label for="newsletter-email" class="mb-1 block text-sm font-medium saturn-text">{{ __('Email Address') }}</label>
            <input id="newsletter-email" type="email" wire:model="email" autocomplete="email" minlength="5" maxlength="255"
                class="w-full rounded-lg border saturn-border bg-transparent px-3 py-2 text-sm saturn-text focus:outline-none focus:ring-2 focus:ring-purple-500/40"
                required />
            @error('email')
                <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>
        <span>
            <x-ui.button :size="'sm'" :$is_section_filled_inverted :icon='$buttonIcon' type="submit">
                {{ $buttonText ?? __('Join') }}
            </x-ui.button>
        </span>
    </form>
</div>
