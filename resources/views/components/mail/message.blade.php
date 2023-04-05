@props(['message'])
<div class="w-full">
    <div
        class="@if ($message->is_read) opacity-40 @endif w-full border-b-2 border-b-zinc-100 p-4 text-zinc-400 transition-all duration-200 hover:bg-zinc-100 hover:opacity-100">
        <div class="flex w-full gap-2">
            <div class="-ml-6 px-7">
                <div class="absolute">
                    <x-mail.message.actions :message="$message" />
                </div>
            </div>
            <div>
            </div>
            <div class="flex w-full justify-between gap-4">

                <div class="grid w-full">
                    <p class="mb-2 font-bold text-zinc-500">{{ $message->name }}
                    </p>
                    <p class="text-sm">
                        {{ $message->getShortSubjectAttribute() }}
                    </p>
                    <div class="mt-4 flex w-full items-center gap-5">
                        <p class="text-sm">
                            {{ $message->getShortMessageAttribute() }}
                        </p>

                    </div>
                </div>
                <div class="grid w-1/4 grid-rows-1 gap-4 text-center">
                    <div>
                        <x-mail.add-favorite :message="$message" />
                    </div>
                    <div
                        class="flex flex-col items-center justify-center p-1 text-center text-xs italic">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="h-4 w-4">
                                <path stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </span>
                        <span class="mx-auto">
                            {{ $message->created_at->diffForHumans() }}
                        </span>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
