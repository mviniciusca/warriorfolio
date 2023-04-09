@props(['item', 'title'])

<div class="flex gap-2">
    {{--  Favorite Tag --}}
    @if ($item->is_starred)
        <div
            class="rounded-md bg-orange-400 p-1 text-xs font-semibold lowercase text-white">
            starred
        </div>
    @endif
    {{-- Read, Unread and Trashed Tags --}}
    <div
        class="{{ $item->is_trashed ? 'bg-red-400' : '' }} {{ $item->is_starred && !$item->is_trashed ? 'bg-orange-400' : '' }} {{ $item->is_read && !$item->is_trashed && !$item->is_starred ? 'bg-zinc-400' : '' }} {{ !$item->is_read && !$item->is_starred && !$item->trashed ? 'bg-black' : '' }} rounded-md p-1 text-xs font-semibold lowercase text-white">
        @if ($item->is_trashed)
            trashed
        @elseif($item->is_read && !$item->is_trashed)
            read
        @elseif(!$item->is_read && !$item->is_starred && !$item->trashed)
            unread
        @endif
    </div>
</div>
