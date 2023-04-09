@props(['show' => null])
<div>
    @if ($show !== null)
        <div
            class="justify-normal -mt-3 grid w-full items-start rounded-md bg-white py-6 px-4 text-zinc-500 shadow-sm">

            <!-- avatar -->

            <div class="flex gap-4">
                <div
                    class="flex h-11 w-11 items-center justify-center rounded-full bg-primary-500 p-1">
                    <span class="text-2xl font-bold text-white">
                        {{ $show->name[0] }}
                    </span>
                </div>
                <div class="mb-8 grid gap-2">
                    <p class="text-lg font-medium leading-5">{{ $show->subject }}
                    </p>
                    <p class="text-md font-semibold">{{ $show->name }}
                        <span class="italic">
                            {{ $show->email }}
                        </span>
                    </p>
                    <p class="text-xs">{{ $show->created_at->diffForHumans() }}
                    </p>
                </div>
            </div>

            <div>
                {{ $show->body }}
            </div>

        </div>
    @endif
</div>
