{{-- Hero Section - This section will show the main content of the website --}}

{{-- Background Image --}}
@if ($background !== null)
    <x-hero.background
        :background="$background"
    />
@endif

{{-- Content Section --}}
<x-content-section>
    {{-- Hero Welcome Text --}}
    <x-hero.welcome />
    {{-- Hero Stacks Icons --}}
    <x-ui.stacks-icons />
</x-content-section>




