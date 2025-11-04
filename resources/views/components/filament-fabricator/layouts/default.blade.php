@aware(['page'])

<x-core.base-layout>
    @if ($header_core)
    <header class="header-section" id="app-header">
        <x-themes.common.navbar />
    </header>
    @endif
    <main class="main-section flex-grow" id="app-main">
        <x-filament-fabricator::page-blocks :blocks="$page->blocks" />
        <x-core.modules.section />
    </main>
    @if ($footer_core)
    <footer class="footer-section mt-auto" id="app-footer">
        <x-themes.common.footer />
    </footer>
    @endif
</x-core.base-layout>
