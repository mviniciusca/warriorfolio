@props([
    'mails',
    'sentCount',
    'trashCount',
    'unreadCount',
    'starredCount',
])

<div>
    <div class="flex h-full w-full bg-gray-100 gap-10 mt-8">
        <div class="w-52" id="sidebar">
            <x-mail.sidebar
                :mails='$mails'
                :sentCount="$sentCount"
                :trashCount="$trashCount"
                :unreadCount="$unreadCount"
                :starredCount="$starredCount"
              />
        </div>
        <div class="w-full" id="content">
            <x-mail.content
                :mails='$mails'
            />
        </div>
    </div>
</div>
