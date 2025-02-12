<div>
    <div class="flex gap-4">
        <p class="cursor-pointer border-b-2 border-b-transparent transition-all duration-100 hover:border-b-primary-500 hover:opacity-90"
            wire:click="setCategory(null)">{{ __('All') }}</p>
        @foreach ($categories as $category)
            <p class="cursor-pointer border-b-2 border-b-transparent transition-all duration-100 hover:border-b-primary-500 hover:opacity-90"
                type="button" wire:click="setCategory({{ $category->id }})">
                {{ $category->name }}
            </p>
        @endforeach

    </div>
    @foreach ($data as $item)
        <x-blog.post.card :$item />
    @endforeach
    <div class="py-8">
        {{ $data->links() }}
    </div>
</div>
