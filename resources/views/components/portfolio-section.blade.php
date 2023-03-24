<x-content-section
    :nav_id="'portfolio'"
    :title="''"
    :subTitle="''"
>
<div class="bg-zinc-900 border blur-bg border-zinc-800 rounded-lg p-16 pb-32 md:mt-36">

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
<style>
    .blur-bg {
        background-image: url("{{ asset('/img/blur-orange.png') }}");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom;
    }
</style>
