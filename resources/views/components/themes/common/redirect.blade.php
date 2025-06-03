@aware(['page'])
@props([
'redirectUrl' => $page->redirect_url ?? null,
'redirectMessage' => __('You will be redirected shortly.'),
'redirectDelay' => 5,
])
@if($page->redirect_url ?? false)
<x-core.layout>
    <div class="flex items-center justify-center min-h-screen saturn-bg">
        <div class="text-center p-6">
            <!-- Loading spinner with countdown from Saturn UI -->
            <div class="flex justify-center mb-6 relative">
                <div class="w-16 h-16 saturn-spinner"></div>
                <div class="absolute inset-0 flex items-center justify-center">
                    <span id="countdown" class="saturn-text-base font-bold"></span>
                </div>
            </div>
            <h1 class="saturn-h3 font-bold mb-4">{{ __('Redirecting...') }}</h1>
            <p class="mb-6">{{ $redirectMessage }}</p>
            @if ($redirectUrl)
            <x-ui.button :href="$redirectUrl" :icon_before="false" style="primary" icon="arrow-forward-sharp">
                {{ __('Go Now') }}
            </x-ui.button>
            @endif
        </div>
    </div>
    <script>
        // Get the redirect delay from the component prop (in seconds)
        const totalSeconds = {{ $redirectDelay }};
        let secondsLeft = totalSeconds;

        // Update the countdown every second
        const countdownInterval = setInterval(() => {
            document.getElementById('countdown').textContent = secondsLeft;
            secondsLeft--;

            if (secondsLeft < 0) {
                clearInterval(countdownInterval);
                window.location.href = "{{ $redirectUrl }}";
            }
        }, 1000);

        // Redirect after the delay
        setTimeout(() => {
            window.location.href = "{{ $redirectUrl }}";
        }, totalSeconds * 1000);
    </script>
    </div>
</x-core.layout>
@endif
