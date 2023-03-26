<div
    class="blur-bg mt-8 rounded-lg border border-zinc-800 bg-zinc-900 p-4 pb-16 pt-8 md:mt-0 md:p-16 md:pb-32">
    <div id="filter">
        <livewire:portfolio.filter :project="$project" />
    </div>
    <div id="listing">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($projects as $project)
                <x-ui.portfolio :key="$project->id"
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
