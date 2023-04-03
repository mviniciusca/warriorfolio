@props(['title', 'action' => null, 'counter', 'showCounter' => false])

<div>
    <button
        wire:click="{{ $action }}"
        class="flex w-full lowercase transition-all duration-100 items-center place-content-between hover:cursor-pointer hover:rounded-md text-zinc-500 hover:bg-zinc-50 hover:font-bold active:bg-zinc-200 hover:text-primary-400"
        >
        <li class="flex gap-2 p-3">
            <div class="text-xl">{{ $slot }}</div>
            <p class="text-sm lowercase">{{ $title }}</p>
        </li>
        {{-- Badge with counter --}}
        @if($showCounter === true && $counter > 0)
            <span class="rounded-full bg-white text-zinc-500 font-bold text-xs px-2 py-1 mr-2">{{ $counter }}</span>
        @endif
    </button>
</div>
