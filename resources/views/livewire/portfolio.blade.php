@props(['projects', 'filters', 'tagTitle', 'tagColor', 'count'])
<div
    class="blur-bg mt-8 rounded-lg border border-zinc-800 bg-zinc-900 p-4 pb-16 pt-8 md:mt-0 md:p-16 md:pb-32">
     <div>
    {{-- Filter Section --}}
        <div class="md:text-md text-xs lg:text-base">
            <div class="flex justify-end gap-5 items-center mb-8">
                    <div class="justify-start">
                    @if($tagTitle !== 'All' && $tagTitle !== 'all' && $count !== 0 && $count !== 1)
                      <span class="lowercase"> Filtering all {{ $count }} projects with <span class="font-bold p-1 border-b-4 pb-1" style="border-bottom-color:{{ $tagColor }}">{{ $tagTitle }}</span> tag</span>
                    @elseif($tagTitle !== 'All' && $tagTitle !== 'all' && $count === 1)
                        <span class="lowercase"> Filtering this project with <span class="font-bold p-1 border-b-4 pb-1" style="border-bottom-color:{{ $tagColor }}">{{ $tagTitle }}</span> tag</span>
                    @elseif($tagTitle === 'All' || $tagTitle === 'all' && $count !== 0)
                        <span class="lowercase"> Showing all {{ $count }} projects</span>
                    @endif
                </div>
        <div class="justify-end">
            @if($filters->count() > 0)
            {{--  Filter --}}
            <form>
                <select
                    class="focus:shadow-outline-zinc mr-6 rounded-md border border-black bg-zinc-800 lowercase leading-8
                    text-white transition-colors duration-150 hover:bg-zinc-900 focus:outline-none active:bg-zinc-800"
                    wire:model="filter">
                    <option value="all">All</option>
                    @foreach ($filters as $tag)
                        <option :wire:key="$tag->id" value="{{ $tag->title }}">{{ $tag->title }}</option>
                    @endforeach
                </select>
            </form>
            @endif
        </div>
    </div>
    </div>
    {{-- Listing Projects from Database --}}
    <div id="listing">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4">
            @foreach ($projects as $project)
                @if($count !== 0)
                <x-ui.portfolio :project="$project"/>
                @endif
            @endforeach
        </div>
          {{-- Empty Section --}}
            @if($count === 0)
              <x-ui.empty-section
                :empty_message="'No project in this section'"
                :empty_icon="'albums-outline'"
              />
            @endif
    </div>
</div>
