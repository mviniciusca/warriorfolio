@props(['filterTags' => ''])
<div
    class="blur-bg mt-8 rounded-lg border border-zinc-800 bg-zinc-900 p-4 pb-16 pt-8 md:mt-0 md:p-16 md:pb-32">
     <div id="filter">
        <livewire:portfolio.filter />
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
