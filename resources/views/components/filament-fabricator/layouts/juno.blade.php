@props(['page'])

<x-core.base-layout bodyClass="juno-theme juno-app-core flex min-h-screen flex-col">
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
            <div class="flex flex-col">
                <!-- Tabs Header -->
                <div class="mb-12 flex space-x-4 border-b border-secondary-200 dark:border-secondary-800">
                    <button type="button"
                        class="tab-button text-xs px-4 py-2 text-secondary-900 dark:text-secondary-100"
                        id="repositories-tab">
                        {{ __('Repositories') }}
                    </button>
                    <button type="button"
                        class="tab-button text-xs px-4 py-2 text-secondary-500 transition-colors hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-secondary-100"
                        id="projects-tab">
                        {{ __('Projects') }}
                    </button>
                    <button type="button"
                        class="tab-button text-xs px-4 py-2 text-secondary-500 transition-colors hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-secondary-100"
                        id="notes-tab">
                        {{__('Notes') }}
                    </button>
                    <button type="button"
                        class="tab-button text-xs px-4 py-2 text-secondary-500 transition-colors hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-secondary-100"
                        id="about-tab">
                        {{ __('About Me') }}
                    </button>
                    <button type="button"
                        class="tab-button text-xs px-4 py-2 text-secondary-500 transition-colors hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-secondary-100"
                        id="contact-tab">
                        {{ __('Contact') }}
                    </button>
                </div>

                <!-- Tabs Content -->
                <div class="tab-content">
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
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const tabButtons = document.querySelectorAll('.tab-button');
                        const tabPanes = document.querySelectorAll('.tab-pane');

                        function setActiveTab(tabName) {
                            localStorage.setItem('activeTab', tabName);
                            window.location.hash = tabName;
                        }

                        function switchTab(tabName) {
                            // Primeiro, reseta os botões
                            tabButtons.forEach(button => {
                                button.classList.remove('active-tab', 'text-secondary-900', 'dark:text-secondary-100');
                                button.classList.add('text-secondary-500', 'dark:text-secondary-400');
                            });

                            // Depois esconde todos os painéis
                            tabPanes.forEach(pane => {
                                if (pane.id === tabName + '-content') {
                                    pane.classList.remove('hidden');
                                } else {
                                    pane.classList.add('hidden');
                                }
                            });

                            // Ativa o botão selecionado
                            const selectedTab = document.getElementById(tabName + '-tab');
                            if (selectedTab) {
                                selectedTab.classList.add('active-tab', 'text-secondary-900', 'dark:text-secondary-100');
                                selectedTab.classList.remove('text-secondary-500', 'dark:text-secondary-400');
                                setActiveTab(tabName);
                            }
                        }

                        // Add click handlers
                        tabButtons.forEach(button => {
                            button.addEventListener('click', () => {
                                const tabName = button.id.replace('-tab', '');
                                switchTab(tabName);
                            });
                        });

                        // Handle back/forward buttons
                        window.addEventListener('popstate', () => {
                            const tabName = window.location.hash.replace('#', '') || 'repositories';
                            switchTab(tabName);
                        });

                        // Initial load - check hash first, then localStorage, fallback to repositories
                        const urlHash = window.location.hash.replace('#', '');
                        const savedTab = localStorage.getItem('activeTab');
                        const initialTab = urlHash || savedTab || 'repositories';
                        switchTab(initialTab);
                    });
                </script>
            </div>

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
