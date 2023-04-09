@props(['message'])

<div class="p-2">
    {{--  show mark as read function --}}
    @if ($message->is_read)
        <x-mail.mark-read :message="$message" />
    @endif
    {{-- show delete / restore fynction  --}}
    <x-mail.delete-message :message="$message" />
</div>
