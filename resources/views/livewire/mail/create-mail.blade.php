<div clas="w-full grid gap-8">
    <form class="grid gap-8" wire:submit="create">
        {{ $this->form }}

        <button
            class="bg-secondary-700 hover:opacity-90 transition-all duration-100 focus:border-2 focus:border-primary-500 py-2 px-4 mx-auto inline-block rounded-md"
            type="submit">
            Submit
        </button>
    </form>

    <x-filament-actions::modals />
</div>
