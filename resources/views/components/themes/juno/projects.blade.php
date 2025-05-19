@props(['data'])

@if($is_active)
<div>
    <x-themes.juno.partials.header subtitle="Showcasing my latest work and creative projects"
        title="Portfolio Projects" />
    <div class="mb-6">
        @livewire('portfolio.gallery')
    </div>
</div>
@endif
