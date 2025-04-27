@props(['data'])

<div>
    <x-themes.juno.partials.header subtitle="Showcasing my latest work and creative projects"
        title="Portfolio Projects" />
    <div class="mb-6 flex items-center gap-2 overflow-x-auto pb-2">
        @livewire('portfolio.gallery')
    </div>
</div>
