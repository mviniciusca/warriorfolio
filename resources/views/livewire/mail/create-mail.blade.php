@props(['is_section_filled_inverted'])

<div>
    <form wire:submit.prevent="create" id="mail">
        {{ $this->form }}
        <x-recaptcha />
        <x-ui.button :$is_section_filled_inverted class="mt-2" :icon_before="false" :type="'submit'"
            :icon="'chevron-forward-outline'">
            {{ __('Send Message') }}
        </x-ui.button>
    </form>
</div>
