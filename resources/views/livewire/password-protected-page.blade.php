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
                    placeholder="{{ __('Enter password') }}" icon="key-outline" iconPosition="left"
                    :error="$error ? __('Incorrect password. Please try again.') : null" required autofocus
                    class="mb-6" />

                <x-ui.button type="submit" style="primary" class="saturn-btn-primary w-full">
                    <span class="flex items-center justify-center gap-2">
                        {{ __('Unlock') }}
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
</div>
