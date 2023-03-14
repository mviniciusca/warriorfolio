<x-content-section
:title='$portfolio_title'
:subTitle='$portfolio_description'
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
