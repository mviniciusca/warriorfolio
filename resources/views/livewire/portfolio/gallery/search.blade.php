<div class="flex-grow order-1 sm:order-none max-w-md">
    <form wire:submit="submit" class="relative">
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none" wire:ignore>
                <x-ui.ionicon icon="search-outline" class="h-3.5 w-3.5 text-secondary-400 dark:text-secondary-500" />
            </div>
            <input type="text" wire:model.live="search" placeholder="{{ __('Search projects...') }}"
                class="w-full rounded-lg border border-secondary-200 bg-white pl-9 pr-3 py-1.5 text-xs text-secondary-900 transition-all duration-200 placeholder:text-secondary-400 focus:border-primary-500 focus:ring-2 focus:ring-primary-500/20 dark:border-secondary-700 dark:bg-secondary-800 dark:text-white dark:placeholder:text-secondary-500 dark:focus:border-primary-400 dark:focus:ring-primary-400/20">
        </div>
    </form>
</div>
