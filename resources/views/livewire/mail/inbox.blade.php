<div class="flex min-h-screen w-full gap-8 rounded-lg bg-white px-4 py-0">
    {{-- Toolbar --}}
    <div class="w-32 items-start pt-8">
        <x-mail.toolbar :wire:key="'filter'" :inboxCount="$inboxCount" :sentCount="$sentCount"
            :starredCount="$starredCount" :trashedCount="$trashedCount" />
    </div>
    {{-- List Messages and Links --}}
    <div class="w-1/3 items-start bg-zinc-50">
        <div>
            @foreach ($messages as $message)
                <x-mail.message :message="$message" :wire:key="$message->id" />
            @endforeach
            {{-- Pagination --}}
            <div class="mt-8 p-8">
                {{ $messages->links() }}
            </div>
            {{--  Epmpty Result  --}}
            @if ($messages->count() == 0)
                <x-mail.message.empty-message />
            @endif
        </div>
    </div>

</div>
