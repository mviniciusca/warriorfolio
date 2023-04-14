@props(['message'])
<div>
    <x-mail.ui.button wire="toggleStarred({{ $message->id }})">
        @if ($message->is_starred)
            <x-svg.star-filled />
        @else
            <x-svg.star />
        @endif
    </x-mail.ui.button>
</div>
