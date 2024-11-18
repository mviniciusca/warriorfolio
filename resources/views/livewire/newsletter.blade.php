<div>
    <form class="" wire:submit="create">
        {{ $this->form }}
        <span class="-mt-1">
            <x-ui.button class="-mt-1 p-2 text-sm" type="submit" icon="chevron-forward-outline">
                {{ $buttonText }}
            </x-ui.button>
        </span>
    </form>
</div>