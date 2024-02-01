<div>
    <form class="flex items-center gap-2" wire:submit="create">
        {{ $this->form }}
        <span class="-mt-1">
            <x-ui.button class="p-2" type="submit" icon="chevron-forward-outline">
                {{ $buttonText }}
            </x-ui.button>
        </span>
    </form>
</div>
