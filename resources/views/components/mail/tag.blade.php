@props(['item', 'class' => 'rounded-md p-1 text-xs font-semibold lowercase text-white'])

<div class="flex">
    {{-- Tag to trashed items --}}
    @if ($item->is_trashed)
        <div class="{{ $class }} bg-red-400">
            trashed
        </div>
    @endif
</div>
