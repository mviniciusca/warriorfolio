<div class="text-center">
    <form wire:submit="create">
        {{ $this->form }}

        <x-ui.button :type="'submit'" :icon="'chevron-forward-outline'">
            {{ __('Send Message') }}
        </x-ui.button>

    </form>
    <x-filament-actions::modals />
</div>
