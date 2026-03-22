<!-- No Results Found -->
<div class="py-10 text-center sm:py-16">
    <div class="space-y-4 rounded-lg p-6 saturn-bg-accent sm:space-y-6 sm:p-10 md:p-12">
        <x-ui.ionicon icon="search-outline" class="mx-auto h-12 w-12 saturn-text opacity-50 sm:h-16 sm:w-16" />
        <div>
            <h3 class="text-sm font-semibold saturn-text sm:text-base">{{ __('No articles found') }}</h3>
            <p class="mt-2 saturn-text text-xs opacity-70 sm:text-sm">
                @if(request('search'))
                {{ __('Try adjusting your search terms or') }}
                <a href="{{ request()->url() }}" class="saturn-text font-medium hover:underline">
                    {{ __('browse all articles') }}
                </a>
                @else
                {{ __('No articles have been published yet.') }}
                @endif
            </p>
        </div>
    </div>
</div>
