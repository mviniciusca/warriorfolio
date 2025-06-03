@aware(['page'])
@props([
'redirectUrl' => $page->redirect_url ?? null,
'redirectMessage' => __('You will be redirected shortly.'),
'redirectDelay' => 5,
])
@if($page->redirect_url ?? false)

<div class="flex items-center justify-center h-screen saturn-bg saturn-text overflow-hidden">
    <div class="text-center p-4 max-w-md">
        <!-- Loading spinner with countdown from Saturn UI -->
        <div class="flex justify-center mb-3 relative">
            <div class="w-14 h-14 saturn-spinner"></div>
            <div class="absolute inset-0 flex items-center justify-center">
                <span id="countdown" class="text-xs font-bold"></span>
            </div>
        </div>
        <h1 class="text-lg font-medium mb-2">{{ __('Redirecting...') }}</h1>
        <p class="mb-4 text-sm">{{ $redirectMessage }}</p>
        @if ($redirectUrl)
        <a href="{{ $redirectUrl }}" class="inline-block">
            <x-ui.button class="text-xs" :href="$redirectUrl" :icon_before="false" style="primary"
                icon="arrow-forward-sharp">
                {{ __('Go Now') }}
            </x-ui.button>
        </a>
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
@endif
