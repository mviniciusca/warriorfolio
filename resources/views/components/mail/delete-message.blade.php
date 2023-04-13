@props(['message'])
<div class="flex items-center gap-4">
    <button
        class="flex rounded-full p-2 transition-all duration-200 hover:bg-zinc-200 hover:text-zinc-600 active:bg-zinc-300 active:text-zinc-900"
        wire:click="toggleTrash('{{ $message->id }}')" @click="open = !open">

        @if (!$message->is_trashed)
            <x-svg.trash />
        @else
            <x-svg.restore-arrow />
        @endif
    </button>

    @if ($message->is_trashed)
        <x-mail.ui.button wire="destroyMessage('{{ $message->id }}')">
            <x-svg.trash />
        </x-mail.ui.button>
    @endif
</div>
