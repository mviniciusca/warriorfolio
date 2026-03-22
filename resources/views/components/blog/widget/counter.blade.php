@if ($blog_data['is_trend_widget_active'] ?? false)
@if ($data)
<div>
    <h1 class="saturn-h5 saturn-text mb-5 flex items-center justify-between text-sm sm:mb-8 sm:text-base">
        {{ __('Topics') }}
        <x-ui.ionicon icon="analytics-outline" class="h-4 w-4 sm:h-5 sm:w-5" />
    </h1>
    <div class="flex flex-wrap gap-2 justify-center">
        @foreach ($data as $item)
        <div class="saturn-badge border saturn-border">{{ ucfirst($item['label']) }}</div>
        @endforeach
    </div>
</div>
@endif
@endif
