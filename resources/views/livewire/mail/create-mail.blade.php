<div class="text-center">
    <form wire:submit="create">
        {{ $this->form }}
        <button
            class="text-md mx-auto mt-4 inline-block rounded-md border border-black border-opacity-20 bg-primary-500 px-12 py-2 text-center text-primary-50 transition-all duration-100 hover:opacity-70 focus:border focus:border-primary-500 active:opacity-100 dark:border-primary-400"
            type="submit">
            <span class="flex content-center items-center justify-center gap-2">
                {{ __('Send') }}
            </span>
        </button>
    </form>
    <x-filament-actions::modals />
</div>
