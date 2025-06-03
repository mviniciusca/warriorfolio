<section class="flex min-h-screen w-full items-center justify-center saturn-y-section saturn-x-section">
    <div class="mx-auto grid max-w-md justify-center text-center">
        <!-- Error message -->
        <h1 class="saturn-h4 tracking-tighter font-semibold mb-6">
            <span class="flex items-center justify-center gap-2">
                <x-ui.ionicon icon="alert-circle-outline" />
                {{ __('Page Not Found') }}
            </span>
        </h1>

        <p class="mb-6 saturn-text font-medium text-sm">
            {{ __('The page you are looking for might have been removed, had its name changed, or is temporarily
            unavailable.') }}
        </p>

        <!-- Action buttons with Saturn UI styling -->
        <div class="flex flex-col items-center justify-center gap-3 sm:flex-row">
            <a href="{{ url('/') }}">
                <x-ui.button class="text-xs" :icon_before="true" icon="home-sharp" style="primary">
                    {{ __('Go to Home') }}
                </x-ui.button>
            </a>
            <a href="{{ url()->previous() }}">
                <x-ui.button class="text-xs" :icon_before="true" icon="arrow-back-sharp" style="secondary">
                    {{ __('Go Back') }}
                </x-ui.button>
            </a>
        </div>
    </div>
</section>
