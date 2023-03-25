<x-content-section
    :nav_id="'portfolio'"
    :title='$portfolio_title'
    :subTitle='$portfolio_description'
>


        <livewire:portfolio />
        {{-- @foreach ($projects as $project )
            <x-ui.portfolio
                :tag="$project->tag"
                :link="$project->link"
                :about="$project->about"
                :cover="$project->cover"
                :title="$project->title"
            />
        @endforeach --}}

{{-- Empty Section --}}
@if ($projects->count() === 0)
    <x-ui.empty-section
        :btn_icon="'add-outline'"
        :btn_text="'Add Project'"
        :empty_message="'You have no projects yet'"
        :empty_icon="'folder-open-outline'"
        :link_path="'/admin/projects/create'"
    />
@endif
</x-content-section>
<style>
    .blur-bg {
        background-image: url("{{ asset('/img/blur-orange.png') }}");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom;
    }
</style>
