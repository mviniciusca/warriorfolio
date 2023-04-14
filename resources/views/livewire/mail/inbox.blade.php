<div>
    <div class="flex h-screen gap-3 text-zinc-800">
        <div class="w-24">
            <x-mail.toolbar :wire:key="'filter'" :inboxCount="$inboxCount"
                :sentCount="$sentCount" :starredCount="$starredCount" :trashedCount="$trashedCount" />
        </div>
        <div
            class="h-screen w-1/2 overflow-hidden rounded-lg bg-white p-4 transition-all duration-100 hover:overflow-y-auto">
            <div>
                {{-- Paginate --}}
                <div class="pt-4 pb-4">
                    {{ $messages->links() }}
                </div>
                {{-- Listing Messages --}}
                @foreach ($messages as $message)
                    <x-mail.message :message="$message" />
                @endforeach
            </div>
            {{-- Empty Messages --}}
            @if ($messages->count() === 0)
                <x-mail.message.empty-message />
            @endif
        </div>
        <div class="h-screen w-1/2 overflow-y-auto p-4">
            <x-mail.reading-panel :show="$show" />
        </div>
    </div>
</div>
