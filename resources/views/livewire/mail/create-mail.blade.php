<div>
    <form wire:submit="create">
        {{ $this->form }}
        <button
            class="bg-primary-500 text-primary-50 mt-4 text-sm dark:border dark:border-secondary-600 hover:opacity-70 active:opacity-100 transition-all duration-100 focus:border focus:border-primary-500 py-2 px-8 mx-auto inline-block rounded-sm"
            type="submit">
            <span class="flex content-center gap-2 justify-center items-center">
                <ion-icon class="text-2xl font-semibold" name="checkmark"></ion-icon>
            </span>
        </button>
    </form>
    <x-filament-actions::modals />
</div>
