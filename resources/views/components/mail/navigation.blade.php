@props(['title', 'mails', 'showCounter' => false])

<div>
    <div class="flex lowercase transition-all duration-100 items-center place-content-between hover:cursor-pointer hover:rounded-md text-zinc-500 hover:bg-zinc-50 hover:font-bold active:bg-zinc-200 hover:text-primary-400">
        <li class="flex items-center justify-start gap-2 p-3">
            <div class="text-xl">{{ $slot }}</div>
            <p>{{ $title }}</p>
        </li>
        {{-- Badge with counter --}}
        @if($showCounter === true && $mails->count() > 0)
            <span class="rounded-full bg-white text-zinc-500 font-bold text-xs px-2 py-1 mr-2">{{ $mails->count() }}</span>
        @endif
    </div>
</div>
