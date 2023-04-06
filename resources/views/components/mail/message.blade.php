@props(['message'])
<div class="w-full">
    <div
        class="mb-2 mt-2 w-full cursor-pointer rounded-xl bg-zinc-50 p-4 text-zinc-500 transition-all duration-200 hover:opacity-100 hover:shadow-md">
        <div class="flex w-full items-center gap-8">

            {{-- Add to favorite (star) --}}
            <div>
                <x-mail.add-favorite :message="$message" />
            </div>

            <div class="flex w-full justify-between gap-4">

                {{-- Name and Subject --}}
                <div class="flex w-full">
                    <p class="mb-2 w-1/3 font-bold">
                        {{ $message->name }}
                    </p>
                    <p class="text-sm">
                        {{ $message->getShortSubjectAttribute() }}
                    </p>
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

                {{-- Actions Menu --}}

                <div class="-ml-6 px-7">
                    <div class="absolute">
                        <x-mail.message.actions :message="$message" />
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
