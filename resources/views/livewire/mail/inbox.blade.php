<div>
    <div class="flex h-screen gap-3 text-zinc-800">
        <div class="w-24">
            <x-mail.toolbar :wire:key="'filter'" :inboxCount="$inboxCount"
                :sentCount="$sentCount" :starredCount="$starredCount" :trashedCount="$trashedCount" />
        </div>
        <div
            class="-mt-10 h-screen w-1/2 overflow-hidden p-4 transition-all duration-100 hover:overflow-y-auto">
            <div class="mt-6">
                @foreach ($messages as $message)
                    <x-mail.message :message="$message" />
                @endforeach
            </div>
        </div>
        <div class="h-screen w-1/2 overflow-y-auto p-4">
            <x-mail.reading-panel :show="$show" />
        </div>
    </div>
</div>
