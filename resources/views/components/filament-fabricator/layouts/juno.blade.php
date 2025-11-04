@props(['page'])

@php
$tabs = $page->tabsSection();
@endphp

<x-core.base-layout bodyClass="juno-theme juno-app-core flex min-h-screen flex-col">
    <header class="header-section" id="app-header">
        <x-themes.common.navbar />
    </header>
    <x-core.layout :with_padding="false">
        <div class="mx-auto flex-grow py-4">
            <!-- Profile Section with generous top space -->
            <div class="mb-6s mt-6">
                <x-themes.juno.profile />
            </div>

            <!-- Tabs System -->
            <x-ui.tabs :tabs="$tabs">
                <!-- Repositories Tab -->
                <div class="tab-pane" id="github-repositories">
                    <x-themes.juno.repositories />
                </div>

                <!-- Portfolio Tab -->
                <div class="tab-pane hidden" id="portfolio">
                    <x-themes.juno.projects />
                </div>

                <!-- Blog Tab -->
                <div class="tab-pane hidden" id="blog">
                    <x-themes.juno.notes />
                </div>

                <!-- About Me Tab -->
                <div class="tab-pane hidden" id="about-me">
                    <x-themes.juno.about />
                </div>

                <!-- Contact Tab -->
                <div class="tab-pane hidden" id="contact">
                    <x-themes.juno.contact />
                </div>
            </x-ui.tabs>
            <!-- Newsletter Section -->
            <div class="mt-16">
                <x-themes.default.newsletter :with_padding="false" :show_light="false"
                    class="bg-dots relative rounded-md border border-secondary-200/50 py-16 dark:border-secondary-900 dark:bg-transparent" />
            </div>
        </div>
    </x-core.layout>
    <!-- Footer -->
    <x-themes.common.footer :with_padding="false" />
</x-core.base-layout>
