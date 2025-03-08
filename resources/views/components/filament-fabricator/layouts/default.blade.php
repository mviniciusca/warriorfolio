<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ session('theme') == 'dark' ? 'dark' : '' }}">

    <head>
        <x-header.meta />
        <x-header.scripts />
    </head>


    <body class="default-theme app-core flex min-h-screen flex-col" id="app">
        @if (!$maintenance || ($discovery && auth()->user()))

            {{-- Over Modules --}}
            <x-core.alert />
            <x-ui.chatbox />

            @if ($header_core)
                <header class="header-section" id="app-header">
                    <x-header.section />
                </header>
            @endif


            <main class="main-section flex-grow" id="app-main">
                <x-core.layout :with_padding='false'>
                    <x-filament-fabricator::page-blocks :blocks="$page->blocks" />
                </x-core.layout>

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
                <footer class="footer-section mt-auto" id="app-footer">
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
