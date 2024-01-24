<div>
    <form class="flex gap-3 items-center" wire:submit="create">
        {{ $this->form }}
        <button
            class="inline-flex text-secondary-50 bg-primary-700 border -mt-4 border-primary-600 py-3 px-3 focus:outline-none hover:bg-primary-600 rounded-md text-sm"
            type="submit">
            {{ $buttonText }}
        </button>
    </form>
</div>