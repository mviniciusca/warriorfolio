@props(['featuredPost', 'posts'])

@if($module_blog ?? false)
<x-core.layout>
    <div class="min-h-screen">
        <!-- Header -->
        <header>
            <div class="mx-auto py-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Warriorfolio Notes</h1>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Laravel and Development</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <!-- Search Form -->
                        <form method="GET" action="{{ request()->url() }}" class="relative" id="searchForm">
                            <div class="relative">
                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="{{ __('Search articles...') }}"
                                    class="saturn-input w-full sm:w-64 pl-10 pr-4" autocomplete="off" id="searchInput">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <x-ui.ionicon icon="search-outline" class="h-5 w-5 saturn-text opacity-50" />
                                </div>
                                @if(request('search'))
                                <a href="{{ request()->url() }}"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <x-ui.ionicon icon="close-outline"
                                        class="h-5 w-5 saturn-text opacity-50 hover:opacity-100" />
                                </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Search Results Info -->
                @if(request('search'))
                <div class="mt-4 p-4 saturn-bg-accent rounded-lg saturn-border border">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="saturn-text text-sm">
                                {{ __('Search results for:') }} <strong>"{{ request('search') }}"</strong>
                            </p>
                            <p class="saturn-text text-xs opacity-70 mt-1">
                                {{ $posts->total() }} {{ $posts->total() === 1 ? __('result found') : __('results
                                found') }}
                            </p>
                        </div>
                        <a href="{{ request()->url() }}" class="saturn-btn-outlined text-sm">
                            <x-ui.ionicon icon="close-outline" />
                            {{ __('Clear search') }}
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </header>

        <div class="mx-auto py-12">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-20">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-12">
                    <!-- Featured Post (only show when not searching) -->
                    @if(!request('search') && $featured_post)
                    <x-blog.partials.featured :featuredPost="$featured_post" />
                    @endif

                    <!-- Posts List -->
                    <div class="space-y-8">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                @if(request('search'))
                                {{ __('Search Results') }}
                                @else
                                {{ __('Latest Articles') }}
                                @endif
                            </h3>
                            @if(!request('search'))
                            <x-ui.button icon="arrow-forward-sharp" style="primary" :icon_before="false">
                                {{ __('View All') }}
                            </x-ui.button>
                            @endif
                        </div>

                        <div class="space-y-8">
                            @if($posts->count() > 0)
                            <x-blog.partials.recent-posts :$posts />
                            @else
                            <!-- No Results Found -->
                            <div class="text-center py-16">
                                <div class="saturn-bg-accent rounded-lg p-12 space-y-6">
                                    <x-ui.ionicon icon="search-outline"
                                        class="mx-auto h-16 w-16 saturn-text opacity-50" />
                                    <div>
                                        <h3 class="saturn-h5 saturn-text">{{ __('No articles found') }}</h3>
                                        <p class="saturn-text opacity-70 text-sm mt-2">
                                            @if(request('search'))
                                            {{ __('Try adjusting your search terms or') }}
                                            <a href="{{ request()->url() }}"
                                                class="saturn-text font-medium hover:underline">
                                                {{ __('browse all articles') }}
                                            </a>
                                            @else
                                            {{ __('No articles have been published yet.') }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>

                        <!-- Pagination -->
                        @if($posts->hasPages())
                        <div class="mt-12">
                            <x-ui.pagination :paginator="$posts" />
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-12">

                    <x-themes.common.profile :centered="true" />

                    <div class="rounded-lg saturn-text border saturn-border-accent p-12 space-y-4">
                        <x-blog.widget.counter />
                    </div>
                    <!-- Newsletter -->
                    <div class="saturn-bg-accent rounded-lg saturn-text border saturn-border-accent p-12 space-y-4">
                        <h1 class="saturn-h5 saturn-text flex justify-between items-center mb-8">
                            {{ __('Newsletter') }}
                            <x-ui.ionicon icon="mail-outline" />
                        </h1>
                        <p class="text-sm opacity-70">{!! __('Join our
                            newsletter and stay updated with the latest articles, tips, and resources for Laravel and
                            development.')
                            !!}</p>
                        @livewire('newsletter', ['is_section_filled_inverted' => true])
                        <p class="text-xs">{{ __('We hate spam!') }}</p>
                    </div>



                </div>
            </div>
        </div>
    </div>
    </div>
</x-core.layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const searchForm = document.getElementById('searchForm');
    let searchTimeout;

    if (searchInput && searchForm) {
        // Auto-submit search with debounce
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);

            searchTimeout = setTimeout(() => {
                if (this.value.length >= 2 || this.value.length === 0) {
                    searchForm.submit();
                }
            }, 500); // 500ms debounce
        });

        // Submit on Enter key
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                clearTimeout(searchTimeout);
                searchForm.submit();
            }
        });
    }
});
</script>
@endif
