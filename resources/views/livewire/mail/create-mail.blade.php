@props(['is_section_filled_inverted'])

<div id="contact-form" class="p-0">
    <form wire:submit.prevent="create" id="mail" class="space-y-4">
        <div class="grid gap-4 sm:grid-cols-2">
            <div>
                <label for="contact-full-name" class="mb-1 block text-sm font-medium saturn-text">{{ __('Full Name') }}</label>
                <input id="contact-full-name" type="text" wire:model="data.name" autocomplete="name" minlength="5" maxlength="50"
                    class="w-full rounded-lg border saturn-border bg-transparent px-3 py-2 text-sm saturn-text focus:outline-none focus:ring-2 focus:ring-purple-500/40"
                    required />
                @error('data.name')
                    <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="contact-email-address" class="mb-1 block text-sm font-medium saturn-text">{{ __('Email Address') }}</label>
                <input id="contact-email-address" type="email" wire:model="data.email" autocomplete="email" minlength="8"
                    maxlength="140"
                    class="w-full rounded-lg border saturn-border bg-transparent px-3 py-2 text-sm saturn-text focus:outline-none focus:ring-2 focus:ring-purple-500/40"
                    required />
                @error('data.email')
                    <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div>
            <label for="contact-phone-number" class="mb-1 block text-sm font-medium saturn-text">{{ __('Phone Number') }}</label>
            <input id="contact-phone-number" type="text" wire:model="data.phone" maxlength="20"
                class="w-full rounded-lg border saturn-border bg-transparent px-3 py-2 text-sm saturn-text focus:outline-none focus:ring-2 focus:ring-purple-500/40"
                required />
            @error('data.phone')
                <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="contact-message-subject" class="mb-1 block text-sm font-medium saturn-text">{{ __('Message Subject') }}</label>
            <input id="contact-message-subject" type="text" wire:model="data.subject" minlength="5" maxlength="140"
                class="w-full rounded-lg border saturn-border bg-transparent px-3 py-2 text-sm saturn-text focus:outline-none focus:ring-2 focus:ring-purple-500/40"
                required />
            @error('data.subject')
                <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="contact-message-body" class="mb-1 block text-sm font-medium saturn-text">{{ __('Message') }}</label>
            <textarea id="contact-message-body" wire:model="data.body" rows="5" maxlength="1200"
                class="w-full rounded-lg border saturn-border bg-transparent px-3 py-2 text-sm saturn-text focus:outline-none focus:ring-2 focus:ring-purple-500/40"
                required></textarea>
            <p class="mt-1 text-xs saturn-text-accent">{{ __('Min 20 and max 1200 characters.') }}</p>
            @error('data.body')
                <p class="mt-1 text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <x-recaptcha />
        <x-ui.button :$is_section_filled_inverted :type="'submit'" style="primary" class="px-5"
            wire:loading.attr="disabled">
            <span wire:loading.remove wire:target="create">{{ __('Send Message') }}</span>
            <span wire:loading wire:target="create">{{ __('Sending…') }}</span>
        </x-ui.button>
    </form>
</div>
