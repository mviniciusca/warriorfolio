<div clas="w-full grid gap-8 items-center">
    <form class="grid gap-8 p-8" wire:submit="create">
        {{ $this->form }}

        <button
            class="bg-secondary-800 dark:border dark:border-secondary-600 hover:opacity-70 active:opacity-100 transition-all duration-100 focus:border focus:border-primary-500 py-2 px-12 mx-auto inline-block rounded-sm"
            type="submit">
            Submit
        </button>
    </form>

    <x-filament-actions::modals />
</div>
