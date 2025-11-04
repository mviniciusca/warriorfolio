<section class="saturn-flex-center min-h-screen saturn-y-section saturn-x-section saturn-transition">
    <div class="mx-auto grid max-w-md justify-center text-center">
        <div class="mb-6">
            <div class="flex items-center justify-center gap-2 mb-4">
                <x-ui.ionicon icon="telescope-outline" class="h-6 w-6" />
            </div>
            <h1 class="saturn-h4 font-semibold">{{ __('404 - Page Not Found') }}</h1>
        </div>
        <p class="mb-6 text-sm">
            {{ __('The page you are looking for might have been removed, had its name changed, or is temporarily
            unavailable.') }}
        </p>
        <div class="mx-auto mt-6 gap-2">
            <a href="{{ url()->previous() }}" class="w-full">
                <x-ui.button style="ghost" class="text-xs" :icon_before="true" icon="arrow-back-outline">
                    {{ __('Go back') }}
                </x-ui.button>
            </a>
        </div>
    </div>
</section>
