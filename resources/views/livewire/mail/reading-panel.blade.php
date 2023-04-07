@props(['message'])
<div>
    @if ($message !== null)
        {{ $message->body }}
    @endif
</div>
