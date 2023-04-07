@props(['message'])
<div class="flex w-full items-center">

    <div wire:click="setMessageId({{ $message->id }})"
        class="@if ($message->is_read) opacity-50 @endif mb-2 mt-2 w-full cursor-pointer p-2 text-zinc-500 transition-all duration-200 hover:bg-gradient-to-r hover:from-zinc-100 hover:to-white hover:opacity-100">
        <div class="flex w-full items-center gap-4">

            {{-- Add to favorite (star) --}}
            <div>
                <x-mail.add-favorite :message="$message" />
            </div>

            <div class="flex w-full justify-between gap-4">

                {{-- Name and Subject --}}
                <div class="flex w-full text-sm font-bold">
                    <div class="mb-2 w-1/3">
                        {{ $message->name }}
                    </div>
                    <div>
                        {{ $message->getShortSubjectAttribute() }}
                    </div>
                </div>

                {{-- Clock Icon and Datetime --}}
                <div class="flex w-1/6 items-center justify-end gap-2">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="text-xs">
                        {{ $message->created_at->diffForHumans() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="flex">
        {{-- Actions Menu --}}

        <div class="-ml-6 -mt-4 px-7">
            <div class="absolute">
                <x-mail.message.actions :message="$message" />
            </div>
        </div>
    </div>
</div>
