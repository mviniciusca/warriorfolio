@props([
    'project',
])
<div class="p-5 filter hover:filter-none opacity-90 hover:opacity-100 transition-all duration-300 hover:-translate-y-3 lg:py-8">
    <div class="absolute z-10 -ml-4 mt-5 text-sm font-semibold text-white">
        @if($project->tag_id)
           <x-portfolio.tag
                :tagLink="$project->link"
                :tagIcon="$project->tag->icon"
                :tagTitle="$project->tag->title"
                :tagColor="$project->tag->color"
            />
        @endif
    </div>
    <div id="project-cover">
       <img src="storage/{{$project->cover}}" class="rounded-2xl" />
    </div>
</div>
