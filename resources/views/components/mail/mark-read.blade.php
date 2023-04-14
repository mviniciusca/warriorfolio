@props(['message'])
<div class="grid">
    <x-mail.ui.button wire="setAsUnread({{ $message->id }})">
        @if ($message->is_read)
            <x-svg.envelope-closed />
        @endif
    </x-mail.ui.button>
</div>
