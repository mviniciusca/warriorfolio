<section class="flex min-h-screen w-full items-center justify-center saturn-y-section saturn-x-section">
    <div class="mx-auto grid max-w-md justify-center text-center">
        <!-- Error message -->
        <h1 class="saturn-h4 tracking-tighter font-semibold mb-2">
            <span class="flex items-center justify-center gap-2">
                <x-ui.ionicon icon="alert-circle-outline" />
                {{ __('Page Not Found') }}
            </span>
        </h1>

        <p class="mb-6 saturn-text-secondary">
            {{ __('The page you are looking for might have been removed, had its name changed, or is temporarily
            unavailable.') }}
        </p>

        <!-- Action buttons with Saturn UI styling -->
        <div class="flex flex-col items-center justify-center gap-3 sm:flex-row">
            <a href="{{ url('/') }}" class="saturn-btn saturn-btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4 mr-1" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 12l2-2m0 0l7-7 7 7m-14 0l2 2m0 0l7 7 7-7m-14 0l2-2" />
                </svg>
                {{ __('Home') }}
            </a>
            <a href="{{ url()->previous() }}" class="saturn-btn saturn-btn-outlined">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4 mr-1" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                {{ __('Go Back') }}
            </a>
        </div>
    </div>
</section>
