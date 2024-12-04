@props([
    'page',
    'maintenance' => null,
    'discovery' => null,
    'header_core' => null,
    'hero_core' => null,
    'about_core' => null,
    'portfolio_core' => null,
    'clients_core' => null,
    'contact_core' => null,
    'newsletter_core' => null,
    'footer_core' => null,
])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ session('theme') == 'dark' ? 'dark' : '' }}">

<head>
    <x-header.meta />
    <x-header.scripts />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="app-core" id="app">
    @if (!$maintenance || ($discovery && auth()->user()))

        {{-- Over Modules --}}
        <x-core.alert />
        <x-ui.chatbox />


        @if ($header_core)
            <header class="header-section" id="app-header">
                <x-header.section />
            </header>
        @endif


        <main class="main-section" id="app-main">

            <x-filament-fabricator::page-blocks :blocks="$page->blocks" />

            @if ($hero_core)
                <x-hero.section />
            @endif

            @if ($about_core)
                <x-about.section />
            @endif

            @if ($portfolio_core)
                <x-project.section />
            @endif

            @if ($clients_core)
                <x-client.section />
            @endif

            @if ($contact_core)
                <x-contact.section />
            @endif

            @if ($newsletter_core)
                <x-newsletter.section />
            @endif

        </main>

        @if ($footer_core)
            <footer class="footer-section" id="app-footer">
                <x-footer.section />
            </footer>
        @endif

    @endif

    {{-- Maintenance Mode --}}
    @if ($maintenance && (!$discovery || !auth()->user()))
        <x-maintenance.section />
    @endif

    <x-header.body-scripts />
</body>

</html>
