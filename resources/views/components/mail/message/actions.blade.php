@props(['message'])

<div>
    {{--  show mark as read function --}}
    @if ($message->is_read && !$message->is_trashed)
        <x-mail.mark-read :message="$message" />
    @endif
    {{-- show delete / restore fynction  --}}
    <x-mail.delete-message :message="$message" />
</div>
