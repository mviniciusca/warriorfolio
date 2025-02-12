<div class="flex gap-4">
    @foreach ($data as $item)
        <form wire:submit='category'>
            <input type="hidden" wire:key='{{ $item->id }} wire:model.fill='{{ $item->id }}'>
            <p class="cursor-pointer" wire:click='category'>{{ $item->name }}</p>
        </form>
    @endforeach
</div>
