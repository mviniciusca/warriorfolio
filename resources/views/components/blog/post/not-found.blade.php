<section class="flex w-full items-center justify-center">
    <div class="mx-auto grid justify-center text-center">
        <svg class="mx-auto my-8 size-6" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z" stroke-linecap="round"
                stroke-linejoin="round" />
        </svg>

        <h1 class="mb-4 text-4xl font-bold text-black dark:text-white">
            404
        </h1>
        <p class="mb-4 text-sm text-black dark:text-white">
            {{ __('Page not found.') }}
        </p>
        <x-ui.button style="outlined">
            <a href="{{ url()->previous() }}">
                {{ __('Go Back') }}
            </a>
        </x-ui.button>
    </div>
</section>
