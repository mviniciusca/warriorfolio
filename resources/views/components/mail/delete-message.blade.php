@props(['message'])
<div class="flex items-center">
    {{-- Restore message or send to trash --}}
    <x-mail.ui.button wire="toggleTrash({{ $message->id }})">
        @if (!$message->is_trashed)
            <x-svg.trash />
        @else
            <x-svg.restore-arrow />
        @endif
    </x-mail.ui.button>

    {{--  Destroy Message from Trash --}}
    @if ($message->is_trashed)
        <x-mail.ui.button wire="destroyMessage('{{ $message->id }}')">
            <x-svg.trash />
        </x-mail.ui.button>
    @endif
</div>
