@props(['data'])

@if($is_active)
<div>
    <x-themes.juno.partials.header :$title :$subtitle />
    <div class="mb-6">
        @livewire('portfolio.gallery')
    </div>
</div>
@endif
