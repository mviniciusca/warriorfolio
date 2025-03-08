<div>
    <div class="-pb-3 my-12 flex gap-5 border-b border-b-secondary-200 dark:border-b-secondary-800">
        <span class="flex items-center gap-2">
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

    @if ($activePostsCount != 0)
        @foreach ($data as $item)
            @if ($item->post->is_active)
                <x-blog.post.card :$item />
            @endif
        @endforeach
    @else
        <x-ui.empty-section :message="'No posts yet.'" :auth="'Create a new Note in your Dashboard.'" />
    @endif

    <div class="py-8">
        {{ $data->links() }}
    </div>
</div>
