@props(['posts'])

<!-- Header -->
<header>
    <div class="mx-auto py-5 sm:py-7 md:py-8">
        <div class="flex flex-col gap-5 sm:flex-row sm:items-start sm:justify-between sm:gap-6">
            <div class="min-w-0 sm:mb-0">
                <h1 class="dg text-2xl font-bold tracking-tight sm:text-3xl">{{ __('Warriorfolio Notes') }}</h1>
                <p class="mt-1 text-xs opacity-80 saturn-text-accent sm:text-sm">
                    {{ __('Laravel News and Tips') }}</p>
            </div>
            <div class="w-full shrink-0 sm:w-auto sm:max-w-md">
                <x-blog.partials.search :$posts />
            </div>
        </div>
    </div>
</header>
