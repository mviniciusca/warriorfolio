{{-- Hero Section - This section will show the main content of the website --}}

{{-- Background Image --}}
@if ($background !== null)
    <x-hero.background
        :background="$background"
    />
@else
   <x-hero.background :background="null" />
@endif

{{-- Content Section --}}
<x-content-section>
    {{-- Hero Welcome Text --}}
    <x-hero.welcome
        :profile='$profile'
        :welcomeText="$welcome->title"
        :subTitleText='$welcome->subtitle'
    />
    {{-- Hero Stacks Icons --}}
    <x-ui.stacks-icons />
</x-content-section>




