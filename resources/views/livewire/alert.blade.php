@props([
'id' => null,
'style' => null,
'message' => null,
'display' => false,
'is_active' => null,
'button_text' => null,
'is_dismissible' => null,
'icon' =>'notifications-outline',
])

<div id="messaging-hub">
    @if ($display && $is_active && $style)
    <x-ui.alert :$style :$id :$icon :$is_dismissible :$button_text>
        {!! $message !!}
    </x-ui.alert>
    @endif
</div>
