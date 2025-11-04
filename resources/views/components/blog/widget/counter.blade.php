@if ($blog_data['is_trend_widget_active'] ?? false)
@if ($data)
<div>
    <h1 class="saturn-h5 saturn-text flex justify-between items-center mb-8">
        {{ __('Topics') }}
        <x-ui.ionicon icon="analytics-outline" />
    </h1>
    <div class="flex flex-wrap gap-2 justify-center">
        @foreach ($data as $item)
        <div class="saturn-badge border saturn-border">{{ ucfirst($item['label']) }}</div>
        @endforeach
    </div>
</div>
@endif
@endif
