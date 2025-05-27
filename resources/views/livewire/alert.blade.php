@props([
'is_dismissible' => null,
'is_active' => null,
'button_text' => null,
'style' => null,
'message' => null,
'icon' =>'notifications-outline',
'id' => null,
'display' => false,
])

<div>
    <div>
        @if ($display && $is_active && $style)
        {{-- Alert Component --}}
        <x-ui.alert :$style :$id :$icon :$is_dismissible :$button_text>
            {!! $message !!}
        </x-ui.alert>
        @endif
    </div>
</div>
