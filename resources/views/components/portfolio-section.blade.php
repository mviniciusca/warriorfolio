<x-content-section
    :nav_id="'projects'"
    :title='$portfolio_title'
    :subTitle='$portfolio_description'
>
{{-- Portfolio Grid --}}
<div class="grid grid-cols-2 gap-4 justify-center items-center md:grid-cols-3 lg:grid-cols-4">
    @foreach ($projects as $project )
            <x-ui.portfolio
                :tag="$project->tag"
                :link="$project->link"
                :about="$project->about"
                :cover="$project->cover"
                :title="$project->title"
            />
    @endforeach
</div>

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
