<div>
    <form class="items-center gap-2" wire:submit="create">
        {{ $this->form }}
        <span class="-mt-1">
            <x-ui.button class="mt-4 p-2 text-sm" type="submit" icon="chevron-forward-outline">
                {{ $buttonText }}
            </x-ui.button>
        </span>
    </form>
</div>