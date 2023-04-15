@props(['filter', 'title' => '', 'counter' => 0])

<div>
    <button
        class="flex w-full items-center border-b-2 border-transparent px-1 py-3 transition-all duration-200 hover:rounded-lg hover:border-b-2 hover:text-primary-400 active:text-primary-100 active:opacity-25"
        wire:click="setFilter('{{ $filter }}')">
        <div class="flex w-full items-center gap-2">
            {{ $slot }}
            <span>{{ $title }}</span>
        </div>
        @if ($counter > 0)
            <span
                class="rounded-full bg-zinc-500 px-2 text-xs font-semibold text-white">{{ $counter }}
            </span>
        @endif
    </button>
</div>
