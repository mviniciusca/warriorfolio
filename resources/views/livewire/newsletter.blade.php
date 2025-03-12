<div>
    <form class="grid sm:flex items-center gap-3" wire:submit="create">
        {{ $this->form }}
        <span>
            <x-ui.button class="mt-1 sm:-mt-2" type="submit" icon="mail-outline">
                {{ $buttonText ?? __('Subscribe') }}
            </x-ui.button>
        </span>
    </form>
</div>
