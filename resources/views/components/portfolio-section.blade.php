<x-content-section
    :nav_id="'portfolio'"
    :title='$portfolio_title'
    :subTitle='$portfolio_description'
>

@if($projects->count() !== 0)
    <livewire:portfolio />
@else
  <x-ui.empty-section
    :btn_icon="'rocket-outline'"
    :btn_text="'add new project'"
    :link_path="'/admin/projects/create'"
    :empty_icon="'rocket-outline'"
    :empty_message="'No project in this section'"
    />
@endif
</x-content-section>

{{-- Portfolio Blur Background --}}

<style>
    .blur-bg {
        background-image: url("{{ asset('/img/blur.png') }}");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom;
    }
</style>

