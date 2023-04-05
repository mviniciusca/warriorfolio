@props(['message'])

<div>
    <div>
        <!-- Tabs -->
        <div class="mb-8 mt-8 border-b border-zinc-200">
            <nav class="flex gap-8 font-bold lowercase" aria-label="Tabs">
                <x-mail.toolbar.button :title="'Inbox'" :filter="'inbox'" />
                <x-mail.toolbar.button :title="'With Star'" :filter="'starred'" />
                <x-mail.toolbar.button :title="'Sent'" :filter="'sent'" />
                <x-mail.toolbar.button :title="'Trash'" :filter="'trashed'" />
        </div>
    </div>
