<div>
    <form wire:submit="create" id="mail">

        {{ $this->form }}

        <x-ui.button class="mt-6" :type="'submit'" :icon="'chevron-forward-outline'">
            {{ __('Send Message') }}
        </x-ui.button>

    </form>
    <x-filament-actions::modals />
</div>
