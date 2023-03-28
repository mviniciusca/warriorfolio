<div
    class="blur-bg mt-8 rounded-lg border border-zinc-800 bg-zinc-900 p-4 pb-16 pt-8 md:mt-0 md:p-16 md:pb-32">
     <div>
        <div class="md:text-md text-xs lg:text-base">
        <div class="mb-8 flex flex-row justify-end pr-4 pl-4">
            @if($filters->count() > 0)
            <form>
                <select
                    class="focus:shadow-outline-zinc mr-0 mb-2 rounded-lg border border-black bg-zinc-800 px-4 py-2 font-medium lowercase leading-4
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
    <div id="listing">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($projects as $project)
                <x-ui.portfolio
                    :projectCover="$project->cover"
                    :projectTitle="$project->title"
                    :projectTag="$project->tag"
                    :tagLink="$project->tag->link"
                    :tagIcon="$project->tag->icon"
                    :tagTitle="$project->tag->title"
                    :tagColor="$project->tag->color"
                />
            @endforeach
        </div>
    </div>
</div>
