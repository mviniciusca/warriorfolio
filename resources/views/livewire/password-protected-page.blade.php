<div>
    <section class="saturn-flex-center min-h-screen saturn-y-section saturn-x-section saturn-transition">
        <div class="rounded-xl max-w-md w-full p-8 text-center">
            <div class="mb-6">
                <div class="flex items-center justify-center gap-2 mb-4">
                    <x-ui.ionicon icon="lock-closed-outline" class="h-6 w-6" />
                </div>
                <h1 class="saturn-h4 font-semibold">{{ __('Locked') }}</h1>
            </div>
            <p class="mb-6 text-sm">
                {{ __('This content is secured with a password') }}
            </p>
            <form wire:submit.prevent="checkPassword" class="mb-6">
                <x-ui.form.input type="password" name="inputPassword" wire:model.lazy="inputPassword"
                    placeholder="{{ __('Enter password') }}" icon="key-outline" iconPosition="left" required autofocus
                    class="mb-6" :disabled="$isUnlocking" />
                <x-ui.button type="submit" style="primary" class="saturn-btn-primary w-full" :disabled="$isUnlocking">
                    <span class="flex items-center justify-center gap-2">
                        @if($isUnlocking)
                        <x-ui.ionicon icon="checkmark-circle-outline" class="h-4 w-4 animate-pulse" />
                        {{ __('Unlocking...') }}
                        @elseif($showError)
                        <x-ui.ionicon icon="close-circle-outline" class="h-4 w-4" />
                        {{ __('Incorrect') }}
                        @else
                        {{ __('Unlock') }}
                        @endif
                    </span>
                </x-ui.button>
            </form>
            <div class="mx-auto mt-6 gap-2">
                <a href="{{ url()->previous() }}" class="w-full">
                    <x-ui.button style="ghost" class="text-xs" :icon_before="true" icon="arrow-back-outline">
                        {{ __('Go back') }}
                    </x-ui.button>
                </a>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('redirect-after-delay', (event) => {
                setTimeout(() => {
                    window.location.href = event[0].url;
                }, 1200); // 1.2 seconds delay for visual feedback
            });

            Livewire.on('hide-error-after-delay', () => {
                setTimeout(() => {
                    @this.call('hideError');
                }, 2000); // 2 seconds delay to show error
            });
        });
    </script>
</div>
