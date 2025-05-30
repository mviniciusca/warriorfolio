@props(['header' => null, 'footer' => null])

<div {{ $attributes->merge(['class' => 'saturn-bg rounded-lg border saturn-border text-sm']) }}>
    @if(isset($header))
    <div class="px-4 py-4 text-base">
        {{ $header }}
    </div>
    @endif

    <div class="saturn-text-accent p-4">
        {{ $slot }}
    </div>

    @if(isset($footer))
    <div class="px-4 py-4">
        {{ $footer }}
    </div>
    @endif
</div>
