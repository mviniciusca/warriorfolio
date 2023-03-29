<x-content-section
    :nav_id="'portfolio'"

>
    <livewire:portfolio />

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
        background-image: url("{{ asset('/img/blur.png') }}");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom;
    }
</style>
