<div class="text-center">
    <form wire:submit="create">
        {{ $this->form }}
        <button
            class="bg-primary-500 mx-auto text-primary-50 mt-4 text-md border border-black dark:border-primary-400 border-opacity-20 hover:opacity-70 active:opacity-100 transition-all duration-100 focus:border focus:border-primary-500 py-2 px-12 inline-block text-center rounded-md"
            type="submit">
            <span class="flex content-center gap-2 justify-center items-center">
                {{ __('Send') }}
            </span>
        </button>
    </form>
    <x-filament-actions::modals />
</div>
