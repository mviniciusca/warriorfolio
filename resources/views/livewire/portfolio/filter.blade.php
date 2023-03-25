<div class="md:text-md pl-4 pr-4 text-xs lg:text-base">
    <div class="mb-8 flex flex-row justify-start pr-4 pl-4">
        <form>
                <select
                class="focus:shadow-outline-zinc mr-0 mb-2 rounded-lg border border-black bg-zinc-800 px-4 py-2 font-medium lowercase leading-4
                text-white transition-colors duration-150 hover:bg-zinc-900 focus:outline-none active:bg-zinc-800"
                wire:model="filter" wire:loading.attr="disabled">
                <option value="all">All</option>
                <option value="vercel">Vercel</option>
                <option value="github">Github</option>
                <option value="dribbble">Dribbble</option>
                <option value="laravel">Laravel</option>
                <option value="web">Web</option>
            </select>
        </form>
    </div>
    <div id="listing">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($projects as $project)
                <x-ui.portfolio
                    :tag="$project->tag"
                    :link="$project->link"
                    :about="$project->about"
                    :cover="$project->cover"
                    :title="$project->title"
                />
            @endforeach
        </div>
    </div>
</div>

