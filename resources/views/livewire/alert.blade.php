<div>
    @if($display)

    <div id="banner" tabindex="-1"
        class="animate__animated animate__fadeInUp animate__delay-3s fixed bottom-5 right-5 z-50 mx-auto flex max-w-2xl items-start justify-between gap-8 rounded-lg border border-b border-gray-200 bg-gray-50 bg-contain bg-center bg-no-repeat px-4 py-3 dark:border-secondary-800 dark:bg-secondary-950 sm:items-center lg:py-4"
        style="background-image: url('img/core/bg/separator-blur-md-bg.png')">
        <p class="flex items-center gap-2 text-sm font-light">

            This website uses cookies to enhance your
            browsing
            experience. By
            continuing, you
            agree to the use of cookies
        </p>
        <button wire:click.live='close' data-collapse-toggle="banner" type="button"
            class="flex items-center rounded-lg p-1.5 text-sm text-secondary-400 hover:bg-secondary-200 hover:text-secondary-900 dark:hover:bg-secondary-600 dark:hover:text-white">
            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                    clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>

    @endif
</div>
