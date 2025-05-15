@props(['page'])

<x-core.base-layout bodyClass="juno-theme juno-app-core flex min-hscreen flex-col">
    <x-slot:header>
        <style>
            .tab-pane {
                transition: opacity 0.2s ease-in-out;
                opacity: 0;
            }

            .tab-pane:not(.hidden) {
                opacity: 1;
            }

            .tab-button {
                font-size: 0.75rem;
                position: relative;
                border-bottom: 2px solid transparent;
            }

            .tab-button.active-tab {
                border-bottom-color: currentColor;
            }
        </style>
    </x-slot:header>

    <header class="header-section" id="app-header">
        <x-header.section />
    </header>
    <x-core.layout :with_padding="false">
        <div class="mx-auto flex-grow py-4">
            <!-- Profile Section with generous top space -->
            <div class="mb-6s mt-6">
                <x-themes.juno.profile />
            </div>

            <!-- Tabs System -->
            <x-ui.tabs :tabs="[
                'repositories' => 'Repositories',
                'projects' => 'Projects',
                'notes' => 'Notes',
                'about' => 'About Me',
                'contact' => 'Contact'
            ]">
                <!-- Repositories Tab -->
                <div class="tab-pane" id="repositories-content">
                    <x-themes.juno.repositories />
                </div>

                <!-- Projects Tab -->
                <div class="tab-pane hidden" id="projects-content">
                    <x-themes.juno.projects />
                </div>

                <!-- Notes Tab -->
                <div class="tab-pane hidden" id="notes-content">
                    <x-themes.juno.notes />
                </div>

                <!-- About Tab -->
                <div class="tab-pane hidden" id="about-content">
                    <x-themes.juno.about />
                </div>

                <!-- Contact Tab -->
                <div class="tab-pane hidden" id="contact-content">
                    <x-themes.juno.contact />
                </div>
            </x-ui.tabs>
            <!-- Newsletter Section -->
            <div class="mt-16">
                <x-newsletter.section :with_padding="false" :show_light="false"
                    class="bg-dots relative rounded-md border border-secondary-200/50 py-16 dark:border-secondary-900 dark:bg-transparent" />
            </div>
            <!-- Footer -->
        </div>
    </x-core.layout>
    <x-footer.section />
</x-core.base-layout>
