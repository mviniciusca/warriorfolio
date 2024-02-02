@props(['page', 'maintenance' => null, 'discovery' => null, 'header_core' => null, 'hero_core' => null, 'about_core' =>
null, 'portfolio_core' => null, 'clients_core' => null, 'contact_core' => null, 'newsletter_core' => null, 'footer_core'
=> null])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ session('theme') == 'dark' ? 'dark' : ''  }}">

<head>
    <x-header.meta />
    <x-header.scripts />
</head>

<body class="app-core" id="app">
    <x-header.alerts />

    @if($header_core)
    {{-- Header Core --}}
    <x-header.section />
    @endif


    {{-- App Default Core  --}}
    @if(!$maintenance || $discovery && auth()->user())
    <x-ui.background />
    <x-ui.chatbox />
    <x-filament-fabricator::page-blocks :blocks="$page->blocks" />
    @endif
    {{-- End App Default Core --}}

    {{-- Maintenance Mode --}}
    @if($maintenance && (!$discovery || !auth()->user()))
    <x-maintenance.section />
    @endif
    {{-- End Maintenance Mode --}}

    @if($hero_core)
    <x-hero.section />
    @endif

    @if($about_core)
    <x-about.section />
    @endif

    @if($portfolio_core)
    <x-project.section />
    @endif

    @if($clients_core)
    <x-client.section />
    @endif

    @if($contact_core)
    <x-contact.section />
    @endif


    @if($newsletter_core)
    <x-newsletter.section />
    @endif

    {{-- Body Scripts --}}
    <x-header.body-scripts />
    {{-- End Body Scripts --}}

    @if($footer_core)
    <x-footer.section />
    @endif

</body>

</html>
