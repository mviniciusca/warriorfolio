<x-content-section
:title="'from dribbble to vercel'"
:class="''"
:fatherClass="'text-center'"
:subTitle="'Do papel ao código. Um overwview dos meus trabalhos!'"
>

<div class="grid md:grid-cols-4 justify-center items-center md:gap-8 grid-cols-1 gap-4">

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
