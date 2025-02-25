@props(['title' => null])

<div>
    <div class="mb-8 inline-block">
        <a class="flex items-center gap-1 font-mono transition-all duration-150 hover:-ml-5 hover:opacity-50 active:opacity-20"
            href="{{ env('APP_URL') . '/blog' }}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
            </svg>
            <p class="font-semibold uppercase">{{ __('Back to the Main Blog') }}</p>
        </a>
    </div>
</div>
