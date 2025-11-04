@props(['posts'])

<!-- Header -->
<header>
    <div class="mx-auto py-8">
        <div class="flex items-center justify-between">
            <div class="mb-6">
                <h1 class="text-3xl tracking-tight font-bold dg">{{ __('Warriorfolio Notes') }}</h1>
                <p class="text-sm mt-1">{{ __('Laravel News and Tips') }}</p>
            </div>
            <x-blog.partials.search :$posts />
        </div>
    </div>
</header>
