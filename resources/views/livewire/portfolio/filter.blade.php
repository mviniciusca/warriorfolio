<div class="md:text-md text-xs lg:text-base">
    <div class="mb-8 flex flex-row justify-start pr-4 pl-4">
        @if($tags->count() > 0)
        <form>
              <select
                class="focus:shadow-outline-zinc mr-0 mb-2 rounded-lg border border-black bg-zinc-800 px-4 py-2 font-medium lowercase leading-4
                text-white transition-colors duration-150 hover:bg-zinc-900 focus:outline-none active:bg-zinc-800"
                wire:model="filter" wire:loading.attr="disabled">
                <option value="all">All</option>
                @foreach ($tags as $tag)
                    <option wire:key="'$tag->title'-tags" value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>
        </form>
        @endif
    </div>
</div>

