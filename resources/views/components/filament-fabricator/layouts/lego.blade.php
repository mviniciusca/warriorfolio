@props(['page', 'maintenance' => null, 'discovery' => null, 'header_core' => null, 'hero_core' => null, 'about_core' =>
null, 'portfolio_core' => null, 'clients_core' => null, 'contact_core' => null, 'newsletter_core' => null, 'footer_core'
=> null])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ session('theme') == 'dark' ? 'dark' : '' }}">

<head>
    <x-header.meta />
    <x-header.scripts />
</head>

<body class="app-core" id="app">

    @if(!$maintenance || $discovery && auth()->user())

    <x-core.alert />

    <x-ui.background />

    <x-ui.chatbox />

    <x-filament-fabricator::page-blocks :blocks="$page->blocks" />




    <x-footer.section />


    @endif

    {{-- Maintenance Mode --}}
    @if($maintenance && (!$discovery || !auth()->user()))
    <x-maintenance.section />
    @endif
    {{-- End Maintenance Mode --}}
    <x-curator::modals.modal />
    <x-header.body-scripts />
</body>

</html>
