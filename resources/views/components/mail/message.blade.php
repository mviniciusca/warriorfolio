@props(['message'])
<div>
    <div
        class="mb-1 rounded-lg bg-zinc-50 p-4 text-sm text-zinc-500 transition-all duration-150">

        <div class="flex items-center gap-5">
            {{-- add to favorite action --}}
            <x-mail.add-favorite :message="$message" />

            {{-- message email and name --}}
            <div class="grid w-1/5 grid-cols-1 overflow-x-hidden">
                <p class="font-bold">{{ $message->name }}</p>
                <p class="text-xs">{{ $message->email }}</p>
            </div>

            {{-- message subject --}}
            <div class="flex-1">
                <p class="font-bold">{{ $message->subject }}</p>
                <p class="text-xs">{{ $message->created_at->diffForHumans() }}
                </p>
            </div>

            {{-- message actions --}}
            <div class="flex items-center gap-2">
                <x-mail.delete-message :message="$message" />
            </div>

        </div>
    </div>
</div>
