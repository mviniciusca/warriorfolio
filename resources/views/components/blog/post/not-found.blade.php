<section class="flex items-center justify-center">
    <div class="mx-auto grid justify-center text-center">
        <x-ui.ionicon icon="alert-circle-outline" class="h-12 w-12 mb-4 mx-auto" />
        <h1 class="mb-4 saturn-h2 font-semibold">
            404
        </h1>
        <p class="mb-4 text-sm">
            {{ __('Page not found.') }}
        </p>
        <x-ui.button style="ghost" icon="arrow-back-outline" icon_before="true">
            <a href="{{ url()->previous() }}">
                {{ __('Go Back') }}
            </a>
        </x-ui.button>
    </div>
</section>
