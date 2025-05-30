@props(['header' => null, 'footer' => null])

<div {{ $attributes->merge(['class' => 'saturn-bg rounded-lg border saturn-border text-sm']) }}>
    @if(isset($header))
    <div class="px-6 py-4">
        {{ $header }}
    </div>
    @endif

    <div class="p-6 leading-relaxed">
        {{ $slot }}
    </div>

    @if(isset($footer))
    <div class="px-6 py-4">
        {{ $footer }}
    </div>
    @endif
</div>
