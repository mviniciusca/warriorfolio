<div class="flex min-h-screen w-full gap-12 rounded-lg bg-white p-8">
    {{-- Toolbar --}}
    <div class="w-64 items-start pt-8">
        <x-mail.toolbar :wire:key="'filter'" :inboxCount="$inboxCount" :sentCount="$sentCount"
            :starredCount="$starredCount" :trashedCount="$trashedCount" />
    </div>
    {{-- List Messages and Links --}}
    <div class="mt-7 w-full items-start bg-white">
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

    {{-- Reading Panel --}}
    @if ($show !== null)
        <div class="w-1/2">
            <x-mail.reading-panel :show="$show" />
        </div>
    @endif
</div>
