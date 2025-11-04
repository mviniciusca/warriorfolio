<!-- No Results Found -->
<div class="text-center py-16">
    <div class="saturn-bg-accent rounded-lg p-12 space-y-6">
        <x-ui.ionicon icon="search-outline" class="mx-auto h-16 w-16 saturn-text opacity-50" />
        <div>
            <h3 class="saturn-h5 saturn-text">{{ __('No articles found') }}</h3>
            <p class="saturn-text opacity-70 text-sm mt-2">
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
