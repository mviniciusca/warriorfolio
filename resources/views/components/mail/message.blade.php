@props(['message'])
<div class="flex overflow-hidden transition-all duration-100">
    <div
        class="{{ $message->is_read ? 'opacity-40 bg-primary-300' : '' }} mb-2 flex w-full gap-4 rounded-md bg-zinc-50 p-4 text-sm text-zinc-500 shadow-sm transition-all duration-200 hover:opacity-70 active:opacity-90">
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
