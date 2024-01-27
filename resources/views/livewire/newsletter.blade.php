<div>
    <form class="flex gap-3 items-center" wire:submit="create">
        {{ $this->form }}
        <button
            class="inline-flex text-secondary-50 bg-primary-500 border -mt-2 border-primary-600 py-2 px-3 focus:outline-none hover:bg-primary-600 rounded-md text-sm"
            type="submit">
            {{ $buttonText }}
        </button>
    </form>
</div>
