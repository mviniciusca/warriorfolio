<x-content-section
:title="'from dribbble to vercel'"
:class="'grid'"
>

    <div class="grid grid-cols-4 justify-center items-center gap-4">

    @foreach ($projects as $project )
            <x-ui.portfolio
            :cover="$project->cover"
            :title="$project->title"
            :tag="$project->tag"
            :link="$project->link"
            :about="$project->about"
            />
    @endforeach

</div>
</x-content-section>
