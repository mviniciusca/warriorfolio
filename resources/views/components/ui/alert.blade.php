@props([
'id' => null,
'icon' => null,
'style' => null,
'button_text' => null,
'is_dismissible' => false,
])

<div {{ $attributes->merge([
    'class' => 'saturn-alert saturn-bg-accent saturn-text border-b saturn-border-accent',
    ]) }}>
    <div class="flex py-4 max-w-7xl mx-auto items-center justify-between">
        <span class="flex items-center gap-2">
            <x-ui.ionicon :$icon class="w-4 h-4" />
            <span>{!! $slot !!}</span>
        </span>
        <x-ui.partials.alert.dismissible :$button_text :$is_dismissible />
    </div>
</div>
</div>

{{-- Default Style: --}}
@if($style === 'default')
<div tabindex="-1" wire:ignore id="wrapper-{{ $id }}"
    class="saturn-alert saturn-bg-accent saturn-text fixed bottom-0 w-full border-t saturn-border-accent animate__fadeInUp">
    <div class="flex py-4 max-w-7xl mx-auto items-center justify-between">
        <span class="flex items-center gap-2">
            <x-ui.ionicon :$icon class="w-4 h-4" />
            <span>{!! $slot !!}</span>
        </span>
        <x-ui.partials.alert.dismissible :$button_text :$is_dismissible />
    </div>
</div>
@endif

{{-- Bumper Style --}}
@if($style === 'bumper')
<div class="saturn-alert saturn-bg-accent border-b saturn-border-accent animate__fadeInDown saturn-text fixed top-0 w-full"
    id="wrapper-{{ $id }}" tabindex="-1">
    <div class="flex py-4 max-w-7xl mx-auto items-center justify-between">
        <span class="flex items-center gap-2">
            <x-ui.ionicon :$icon class="w-4 h-4" />
            <span>{!! $slot !!}</span>
        </span>
        <x-ui.partials.alert.dismissible :$button_text :$is_dismissible />
    </div>
</div>
</div>
@endif

{{-- Banner Style --}}
@if($style === 'banner')
<div class="saturn-alert saturn-bg-accent saturn-text top-0 w-full border-b saturn-border-accent" id="wrapper-{{ $id }}"
    tabindex="-1">
    <div class="flex py-4 max-w-7xl mx-auto items-center justify-between">
        <span class="flex items-center gap-2">
            <x-ui.ionicon :$icon class="w-4 h-4" />
            <span>{!! $slot !!}</span>
        </span>
        <x-ui.partials.alert.dismissible :$button_text :$is_dismissible />
    </div>
</div>
@endif

{{-- Toast Style --}}
