<div>
    {{-- Toolbar --}}
    <div>
        <x-mail.toolbar :wire:key="'filter'" />
    </div>

    {{-- List Messages --}}
    <div>
        @foreach ($messages as $message)
            <x-mail.message :message="$message" :wire:key="$message->id" />
        @endforeach
    </div>
    {{-- Pagination --}}
    <div class="mt-8">
        {{ $messages->links() }}
    </div>
</div>
