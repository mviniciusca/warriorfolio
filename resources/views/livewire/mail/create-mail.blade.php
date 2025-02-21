<div>
    <form wire:submit="create" id="mail">

        {{ $this->form }}

        <x-ui.button :type="'submit'" :icon="'chevron-forward-outline'">
            {{ __('Send Message') }}
        </x-ui.button>

    </form>
    <x-filament-actions::modals />
</div>
