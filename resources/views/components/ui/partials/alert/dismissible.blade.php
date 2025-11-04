@props([
'is_dismissible' => false,
'button_text' => null,
])

@if ($is_dismissible)
@if ($button_text)
<x-ui.button style="primary" wire:click="close">
    <p class="text-xs">{!! $button_text !!}</p>
</x-ui.button>
@else
<x-ui.ionicon class="cursor-pointer" icon="close-outline" wire:click="close" />
@endif
@endif
