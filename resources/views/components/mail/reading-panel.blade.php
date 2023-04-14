@props(['show' => null])
<div>
    @if ($show !== null)
        <div class="-mt-4 rounded-md bg-white p-8 text-zinc-500 shadow-sm">
            <div id="toolbar" class="mb-7 flex items-center justify-between">
                {{--  Actions: Add to Favorite and Tags --}}
                <div class="flex items-center">
                    <div>
                        <x-mail.add-favorite :message="$show" />
                    </div>
                    <div>
                        <x-mail.mark-read :message="$show" />
                    </div>
                    {{-- Tag --}}
                    <div class="pl-8">
                        <x-mail.tag :item="$show" />
                    </div>
                </div>
                {{-- Actions: Delete / Restore --}}
                <div class="flex">
                    <div class="pr-2 pl-2">
                        <x-mail.delete-message :message="$show" />
                    </div>
                </div>
            </div>
            {{-- Message ID Block --}}
            <div class="flex gap-4 pb-4" id="message-id">
                <div id="avatar">
                    <div
                        class="flex h-12 w-12 items-center justify-center rounded-full bg-zinc-200 text-center text-lg font-bold text-zinc-500">
                        {{ $show->name[0] }}
                    </div>
                </div>
                {{-- Message Info --}}
                <div class="" id="message-info" class="ml-4">
                    <div class="flex items-center gap-2">
                        <div class="text-lg font-bold">
                            {{ $show->name }}
                        </div>
                        <div class="text-xs font-semibold">
                            {{ $show->email }}
                        </div>
                    </div>
                    <div class="flex items-center gap-4 text-xs text-zinc-600">
                        <p>{{ $show->created_at->format('d/m/Y H:i') }}</p>
                        <p>{{ $show->created_at->diffForHumans() }}</p>
                    </div>
                </div>
            </div>
            {{-- Message Content --}}
            <div class="grid pt-8">
                <div class="text-lg font-semibold leading-tight">
                    {{ $show->subject }}</div>
                <div class="pt-8 text-sm">{!! html_entity_decode($show->body) !!}</div>
            </div>
            {{--  Future: Response Widget --}}
            <x-mail.message.response :item="$show" />
    @endif
</div>
{{--  Select a Message --}}
<div class="grid h-full items-center">
    @if ($show === null)
        <div class="flex h-64 items-center justify-center">
            <div class="text-center text-lg font-semibold text-zinc-500">
                <x-mail.message.empty-reading-panel />
            </div>
        </div>
    @endif
</div>
