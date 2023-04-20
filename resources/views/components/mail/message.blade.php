@props(['message'])
<div class="flex overflow-hidden transition-all duration-100">
    <div
        class="{{ $message->is_starred && !$message->is_trashed && !$message->is_sent ? 'bg-orange-50' : '' }} {{ $message->is_read ? 'opacity-40' : '' }} {{ $message->is_sent && !$message->is_trashed ? 'bg-indigo-100' : '' }} {{ $message->is_trashed ? 'bg-red-100 important' : '' }} {{ !$message->is_read && !$message->is_trashed && !$message->is_sent ? 'bg-zinc-50' : '' }} mb-2 flex w-full gap-4 rounded-md p-4 text-sm text-zinc-500 shadow-sm transition-all duration-200 hover:opacity-70 active:opacity-100">
        {{-- Add to favorite --}}
        <x-mail.add-favorite :message="$message" />
        {{-- Message --}}
        <div class="grid w-full cursor-pointer font-medium"
            wire:click="setMessageId({{ $message->id }})">
            <span class="font-bold">
                {{ $message->name }}</span>
            <span>
                {{ $message->subject }}<br>
                <p class="text-xs italic">
                    {{ $message->created_at->format('d/m/Y H:i') }}.
                    {{ $message->created_at->diffForHumans() }}
                </p>
            </span>
        </div>
        {{-- Mark as read and delete --}}
        <div class="flex items-start">
            <x-mail.message.actions :message="$message" />
        </div>
    </div>
</div>
