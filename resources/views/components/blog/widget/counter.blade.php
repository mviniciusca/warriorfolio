@if ($blog_data['is_trend_widget_active'] ?? false)
@if ($data)
<div class="py-6">
    <h1 class="my-4 flex justify-between text-sm font-semibold">
        <p>{{ _('Trends') }}</p>
        <x-ui.ionicon icon="analytics-outline" />
    </h1>
    @foreach ($data as $item)
    <div class="flex justify-between border-b saturn-border py-2 pb-3 text-sm">
        <p>{{ $item['label'] }}</p>
        <p class="rounded-md font-bold saturn-bg-inverse saturn-text-inverse px-3 py-0.5 text-xs">{{
            $item['count'] }}
        </p>
    </div>
    @endforeach
</div>
@endif
@endif
