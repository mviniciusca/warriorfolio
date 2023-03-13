<x-content-section
:title="'from dribbble to vercel'"
:class="''"
:fatherClass="'text-center'"
:subTitle="'Do papel ao código. Um overwview dos meus trabalhos!'"
>

<div class="grid grid-cols-2 gap-4 justify-center items-center md:grid-cols-3 lg:grid-cols-4">

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
