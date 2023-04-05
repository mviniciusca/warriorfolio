@props(['filter', 'title', 'counter' => 0])

<div>
    <button
        class="flex items-center gap-1 border-b-4 border-transparent p-2 pb-3 transition-all duration-100 hover:border-b-4 hover:border-b-primary-500 hover:text-primary-400"
        wire:click="setFilter('{{ $filter }}')">
        <div class="flex items-center">
            <span class="text-md">{{ $title }}</span>
            @if ($counter > 0)
                <span
                    class="ml-2 rounded-full bg-white px-1 text-xs text-zinc-600">{{ $counter }}
                </span>
            @endif
        </div>
    </button>
</div>
