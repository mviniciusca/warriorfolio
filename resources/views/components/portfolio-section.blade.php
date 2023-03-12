<x-content-section
:title="'from dribbble to vercel'"
:class="'grid'"
:subTitle="'Do papel ao código. Um overwview dos meus trabalhos!'"
>

<div class="grid grid-cols-4 justify-center items-center gap-8">

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
