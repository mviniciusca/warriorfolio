@props(['posts'])

<div class="flex items-center gap-4">
    <!-- Search Form -->
    <form method="GET" action="{{ request()->url() }}" class="relative" id="searchForm">
        <div class="relative">
            <x-ui.form.input type="text" name="search" value="{{ request('search') }}" icon="search-outline"
                placeholder="{{ __('Search articles...') }}" class="saturn-input w-full sm:w-64" autocomplete="off"
                id="searchInput" />
            @if(request('search'))
            <a href="{{ request()->url() }}" class="absolute inset-y-0 right-0 pr-3 flex items-center">
                <x-ui.ionicon icon="close-outline" class="h-5 w-5 saturn-text opacity-50 hover:opacity-100" />
            </a>
            @endif
        </div>
    </form>
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
                {{ $posts->total() }} {{ $posts->total() === 1 ? __('result found') : __('results found') }}
            </p>
        </div>
        <a href="{{ request()->url() }}" class="saturn-btn-outlined text-sm">
            <x-ui.ionicon icon="close-outline" />
            {{ __('Clear search') }}
        </a>
    </div>
</div>
@endif

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
