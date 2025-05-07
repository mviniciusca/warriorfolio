@props([
'buttonText' => null,
'buttonIcon' => null ?? 'mail-outline',
])
<div>
    <form class="grid items-center gap-4" wire:submit="create">
        {{ $this->form }}
        <span>
            <x-ui.button :size="'sm'" class="mt-1 sm:-mt-2" :icon='$buttonIcon' type="submit">
                {{ $buttonText ?? __('Join') }}
            </x-ui.button>
        </span>
    </form>
</div>
