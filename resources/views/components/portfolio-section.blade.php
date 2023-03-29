<x-content-section
    :nav_id="'portfolio'"
>

<livewire:portfolio />

</x-content-section>
<style>
    .blur-bg {
        background-image: url("{{ asset('/img/blur.png') }}");
        background-repeat: no-repeat;
        background-size: cover;
        background-position: bottom;
    }
</style>
