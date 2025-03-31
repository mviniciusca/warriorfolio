<div>
    <form class="grid items-center gap-4" wire:submit="create">
        {{ $this->form }}
        <span>
            <x-ui.button class="mt-1 sm:-mt-2" type="submit" icon="mail-outline">
                {{ $buttonText ?? __('Join') }}
            </x-ui.button>
        </span>
    </form>
</div>
