@props(['is_section_filled_inverted'])

<div>
    <form wire:submit.prevent="create" id="mail">
        {{ $this->form }}
        <div class="flex justify-center mb-4" wire:ignore>
            <div class="g-recaptcha" data-sitekey="{{ config('recaptcha.site_key') }}"
                data-callback="onRecaptchaSuccess"></div>
        </div>
        <x-ui.button :$is_section_filled_inverted class="mt-6" :type="'submit'" :icon="'chevron-forward-outline'">
            {{ __('Send Message') }}
        </x-ui.button>
    </form>
    <x-filament-actions::modals />

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        function onRecaptchaSuccess(token) {
            @this.set('recaptchaToken', token);
        }

        document.addEventListener('livewire:navigated', () => {
            if (typeof grecaptcha !== 'undefined') {
                grecaptcha.reset();
            }
        });
    </script>
    </script>
</div>
