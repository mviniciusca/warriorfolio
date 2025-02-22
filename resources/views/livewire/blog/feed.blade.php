<div>
    <div class="-pb-3 my-12 flex gap-5 border-b border-b-secondary-200 dark:border-b-secondary-800">
        <span class="flex items-center gap-2">
            {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0Z" />
            </svg> --}}
            @if ($categories->count() >= 2)
                <p class="cursor-pointer border-b-2 border-b-transparent pb-3 text-sm font-light transition-all duration-150 hover:border-b-secondary-900 active:opacity-10 dark:hover:border-b-secondary-200"
                    wire:click="setCategory(null)">{{ __('All') }}
                </p>
            @endif
        </span>
        @foreach ($categories as $category)
            <p class="cursor-pointer border-b-2 border-b-transparent pb-3 text-sm font-light transition-all duration-150 hover:border-b-secondary-900 active:opacity-10 dark:hover:border-b-secondary-200"
                wire:click="setCategory({{ $category->id }})">
                {{ $category->name }}
            </p>
        @endforeach
    </div>
    @foreach ($data as $item)
        @if ($item->post->is_active)
            <x-blog.post.card :$item />
        @endif
    @endforeach
    <div class="py-8">
        {{ $data->links() }}
    </div>
</div>
