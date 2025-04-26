@props(['page'])

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <x-header.scripts />
        <style>
            .tab-pane {
                transition: opacity 0.2s ease-in-out;
                opacity: 0;
            }

            .tab-pane:not(.hidden) {
                opacity: 1;
            }

            .tab-button {
                font-size: 0.875rem;
                position: relative;
                border-bottom: 2px solid transparent;
            }

            .tab-button.active-tab {
                border-bottom-color: currentColor;
            }
        </style>
        <x-core.modules.over />
    </head>

    <body class="flex min-h-screen flex-col antialiased transition-colors duration-200">
        <x-ui.background />
        <x-header.section />
        <div class="container mx-auto max-w-5xl flex-grow py-16">
            <!-- Profile Section with generous top space -->
            <div class="mb-12 mt-12 px-4">
                <x-themes.juno.profile />
            </div>

            <!-- Tabs System -->
            <div class="flex flex-col">
                <!-- Tabs Header -->
                <div class="mb-12 flex space-x-4 border-b border-secondary-200 px-4 dark:border-secondary-800">
                    <button class="tab-button active-tab px-4 py-2 text-sm text-secondary-900 dark:text-secondary-100"
                        id="repositories-tab" onclick="switchTab('repositories')">
                        Repositories
                    </button>
                    <button
                        class="tab-button px-4 py-2 text-sm text-secondary-500 transition-colors hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-secondary-100"
                        id="projects-tab" onclick="switchTab('projects')">
                        Projects
                    </button>
                    <button
                        class="tab-button px-4 py-2 text-sm text-secondary-500 transition-colors hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-secondary-100"
                        id="notes-tab" onclick="switchTab('notes')">
                        Notes
                    </button>
                    <button
                        class="tab-button px-4 py-2 text-sm text-secondary-500 transition-colors hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-secondary-100"
                        id="about-tab" onclick="switchTab('about')">
                        About Me
                    </button>
                    <button
                        class="tab-button px-4 py-2 text-sm text-secondary-500 transition-colors hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-secondary-100"
                        id="contact-tab" onclick="switchTab('contact')">
                        Contact
                    </button>
                </div>

                <!-- Tabs Content -->
                <div class="tab-content">
                    <!-- Repositories Tab -->
                    <x-themes.juno.repositories :githubUser="'mviniciusca'" :repoQuantity="9" />

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
            </div>

            <!-- Newsletter Section -->
            <div class="mt-16">
                <x-newsletter.section :show_light="false"
                    class="bg-dots relative rounded-md border border-secondary-200/50 py-16 dark:border-secondary-900 dark:bg-transparent" />
            </div>

            <!-- Footer -->
        </div>
        <x-footer.section class="mt-16" />
        <x-header.body-scripts />
        <!-- Dark Mode Toggle Script -->
        <script>
            // Check for saved theme preference or use the system preference
            const themeToggleBtn = document.getElementById('theme-toggle');

            // Function to set the theme
            function setTheme(isDark) {
                if (isDark) {
                    document.documentElement.classList.add('dark');
                    localStorage.theme = 'dark';
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.theme = 'light';
                }
            }

            // Initialize theme based on saved preference or system preference
            if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia(
                    '(prefers-color-scheme: dark)').matches)) {
                setTheme(true);
            } else {
                setTheme(false);
            }

            // Toggle theme when button is clicked
            themeToggleBtn.addEventListener('click', function() {
                const isDark = document.documentElement.classList.contains('dark');
                setTheme(!isDark);
            });

            // Remember active tab
            function setActiveTab(tabName) {
                localStorage.setItem('activeTab', tabName);
            }

            // Tabs functionality
            function switchTab(tabName) {
                // Hide all tab panes
                document.querySelectorAll('.tab-pane').forEach(function(tabPane) {
                    tabPane.classList.add('hidden');
                    tabPane.classList.remove('active');
                });

                // Update tab buttons
                document.querySelectorAll('.tab-button').forEach(function(tabButton) {
                    tabButton.classList.remove('active-tab');
                    tabButton.classList.add('text-secondary-500', 'dark:text-secondary-400');
                    tabButton.classList.remove('text-secondary-900', 'dark:text-secondary-100');
                });

                // Show the selected tab pane
                const selectedPane = document.getElementById(tabName + '-content');
                selectedPane.classList.remove('hidden');
                selectedPane.classList.add('active');

                // Style the active tab button
                const activeTab = document.getElementById(tabName + '-tab');
                activeTab.classList.add('active-tab');
                activeTab.classList.remove('text-secondary-500', 'dark:text-secondary-400');
                activeTab.classList.add('text-secondary-900', 'dark:text-secondary-100');

                // Save active tab
                setActiveTab(tabName);
            }

            // Initialize active tab
            document.addEventListener('DOMContentLoaded', function() {
                const savedTab = localStorage.getItem('activeTab') || 'repositories';
                switchTab(savedTab);
            });
        </script>
    </body>

</html>
