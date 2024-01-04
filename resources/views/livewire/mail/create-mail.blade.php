<div>
    <form wire:submit="create">
        {{ $this->form }}
        <button
            class="bg-secondary-800 mt-12 text-sm dark:border dark:border-secondary-600 hover:opacity-70 active:opacity-100 transition-all duration-100 focus:border focus:border-primary-500 py-2 px-8 mx-auto inline-block rounded-sm"
            type="submit">
            Send Message
        </button>
    </form>
    <x-filament-actions::modals />
</div>
