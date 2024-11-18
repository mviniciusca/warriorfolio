<div>
    <form wire:submit="create">
        {{ $this->form }}
        <span class="mt-4">
            <x-ui.button class="p-2 mt-4" type="submit" icon="chevron-forward-outline">
                {{ $buttonText ?? __('Subscribe') }}
            </x-ui.button>
        </span>
    </form>
</div>