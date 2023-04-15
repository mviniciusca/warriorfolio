@props(['message', 'inboxCount', 'sentCount', 'starredCount', 'trashedCount'])

<div>
    <div class="rounded-md bg-white p-2">
        <nav class="text-xs font-bold" aria-label="Tabs">

            {{-- Inbox --}}
            <x-mail.toolbar.button :counter='$inboxCount' :filter="'inbox'">
                <x-svg.inbox />
            </x-mail.toolbar.button>

            {{-- With Star --}}
            <x-mail.toolbar.button :counter='$starredCount' :filter="'starred'">
                <x-svg.star />
            </x-mail.toolbar.button>

            {{-- Sent --}}
            <x-mail.toolbar.button :counter='$sentCount' :filter="'sent'">
                <x-svg.airplane />
            </x-mail.toolbar.button>

            {{-- Trashed --}}
            <x-mail.toolbar.button :counter='$trashedCount' :filter="'trashed'">
                <x-svg.trash />
            </x-mail.toolbar.button>

    </div>
</div>
