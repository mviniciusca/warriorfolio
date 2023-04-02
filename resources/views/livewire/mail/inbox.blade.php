@props(['mails'])

<div>
    <div class="flex h-full w-full bg-gray-100 gap-10">
        <div class="w-52" id="sidebar">
            <x-mail.sidebar :mails='$mails' />
        </div>
        <div class="w-full" id="content">
            <x-mail.content :mails='$mails' />
        </div>
    </div>
</div>
