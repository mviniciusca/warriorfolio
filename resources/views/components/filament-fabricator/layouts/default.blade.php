@aware(['page'])

<!DOCTYPE html>
<html class="{{ session('theme', 'light') == 'dark' ? 'dark' : '' }}"
    lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <x-core.modules.header />
    </head>

    <body class="default-theme app-core flex min-h-screen flex-col" id="app-wrapper">

        @if (!$maintenance || ($discovery && auth()->user()))
            <x-core.modules.over />
            @if ($header_core)
                <header class="header-section" id="app-header">
                    <x-header.section />
                </header>
            @endif
            <main class="main-section flex-grow" id="app-main">
                <x-filament-fabricator::page-blocks :blocks="$page->blocks" />
                <x-core.modules.section />
            </main>
            @if ($footer_core)
                <footer class="footer-section mt-auto" id="app-footer">
                    <x-footer.section />
                </footer>
            @endif
        @endif
        @if ($maintenance && (!$discovery || !auth()->user()))
            <x-maintenance.section />
        @endif
        <x-header.body-scripts />
    </body>

</html>
