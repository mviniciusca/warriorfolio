@props([
'header' => null,
'footer' => null,
'is_section_filled_inverted' => false,
'is_border' => false,
'is_card_filled' => false,
])

<div class="
{{ $is_section_filled_inverted ? 'saturn-bg-inverse saturn-text-inverse' : 'saturn-text saturn-bg' }}
{{ $is_border ? 'border saturn-border' : '' }}
{{ $is_border && !$is_section_filled_inverted ? 'saturn-text saturn-bg border saturn-border' : '' }}
{{ $is_border && $is_section_filled_inverted ? 'border saturn-border-inverse' : '' }}
{{ $is_card_filled && !$is_section_filled_inverted ? 'saturn-bg-accent saturn-text-accent' : '' }}
{{ $is_card_filled && $is_section_filled_inverted ? 'saturn-bg-accent-inverse saturn-text-accent-inverse' : '' }} rounded-lg overflow-hidden p-4
">
    @if(isset($header))
    <div class="text-sm font-medium py-2">
        {{ $header }}
    </div>
    @endif

    <div class="text-sm leading-relaxed py-4">
        {{ $slot }}
    </div>

    @if(isset($footer))
    <div class="py-2">
        {{ $footer }}
    </div>
    @endif
</div>
