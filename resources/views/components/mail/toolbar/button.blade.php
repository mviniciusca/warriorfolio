@props(['filter', 'title', 'counter' => 0])

<div>
    <button
        class="flex w-full border-b-2 border-transparent px-1 py-3 transition-all duration-100 hover:rounded-lg hover:border-b-2 hover:bg-primary-50 hover:text-primary-400"
        wire:click="setFilter('{{ $filter }}')">
        <div class="flex w-full items-center gap-2">
            {{ $slot }}
            <span>{{ $title }}</span>
        </div>
        @if ($counter > 0)
            <span
                class="ml-2 rounded-full bg-primary-300 px-1 text-xs text-primary-800">{{ $counter }}
            </span>
        @endif
    </button>
</div>
