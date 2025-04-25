@props(['page'])

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Developer Portfolio</title>
        <link href="https://fonts.googleapis.com" rel="preconnect">
        <link crossorigin href="https://fonts.gstatic.com" rel="preconnect">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <x-header.scripts />
        <script>
            tailwind.config = {
                darkMode: 'class',
                theme: {
                    extend: {
                        fontFamily: {
                            sans: ['Inter', 'sans-serif'],
                        },
                    }
                }
            }
        </script>
        <style>
            .tab-pane {
                transition: opacity 0.2s ease-in-out;
                opacity: 0;
            }

            .tab-pane:not(.hidden) {
                opacity: 1;
            }

            .tab-button {
                transition: all 0.2s ease-in-out;
                border-right: 2px solid transparent;
            }

            .tab-button.active-tab {
                border-right-color: currentColor;
                background-color: rgba(0, 0, 0, 0.04);
            }

            .dark .tab-button.active-tab {
                background-color: rgba(255, 255, 255, 0.04);
            }
        </style>
        <x-core.modules.over />
    </head>

    <body
        class="flex min-h-screen flex-col border border-secondary-200 font-sans antialiased transition-colors duration-200 dark:border-secondary-800 dark:bg-secondary-950">
        <x-ui.background />
        <x-header.section />
        <div class="container mx-auto max-w-5xl flex-grow px-4 py-16">

            <!-- Profile Section with generous top space -->
            <div class="mb-12 mt-4">
                <x-themes.juno.profile :showCompany="true" :showEmail="true" />
            </div>

            <!-- Tabs System -->
            <div class="flex pt-6">
                <!-- Tabs Header -->
                <div class="mb-12 flex min-w-[120px] flex-col space-y-2 pr-4">
                    <button
                        class="tab-button active-tab px-3 py-2 text-left text-xs text-secondary-900 dark:text-secondary-100"
                        id="repositories-tab" onclick="switchTab('repositories')">
                        Repositories
                    </button>
                    <button
                        class="tab-button px-3 py-2 text-left text-xs text-secondary-500 transition-colors hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-secondary-100"
                        id="projects-tab" onclick="switchTab('projects')">
                        Projects
                    </button>
                    <button
                        class="tab-button px-3 py-2 text-left text-xs text-secondary-500 transition-colors hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-secondary-100"
                        id="notes-tab" onclick="switchTab('notes')">
                        Notes
                    </button>
                    <button
                        class="tab-button px-3 py-2 text-left text-xs text-secondary-500 transition-colors hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-secondary-100"
                        id="about-tab" onclick="switchTab('about')">
                        About Me
                    </button>
                    <button
                        class="tab-button px-3 py-2 text-left text-xs text-secondary-500 transition-colors hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-secondary-100"
                        id="contact-tab" onclick="switchTab('contact')">
                        Contact
                    </button>
                </div>

                <!-- Tabs Content -->
                <div class="tab-content flex-1 pl-8">
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
                        <div class="mb-8">
                            <h2 class="text-base font-medium text-secondary-900 dark:text-secondary-100">Get in
                                Touch
                            </h2>
                            <p class="mt-1 text-xs text-secondary-600 dark:text-secondary-400">Have a project in
                                mind?
                                Let's work together</p>
                        </div>

                        <div class="grid gap-8 md:grid-cols-2">
                            <!-- Contact Info Column -->
                            <div class="space-y-6">
                                <div class="p-6">
                                    <h3 class="mb-4 text-sm font-medium text-secondary-900 dark:text-secondary-100">
                                        Company Information</h3>
                                    <div class="space-y-4">
                                        <div class="flex items-start gap-3">
                                            <x-ui.ionicon
                                                class="mt-1 h-5 w-5 text-secondary-600 dark:text-secondary-400"
                                                icon="location-outline" />
                                            <div>
                                                <p
                                                    class="text-sm font-medium text-secondary-900 dark:text-secondary-100">
                                                    Address</p>
                                                <p class="mt-1 text-sm text-secondary-600 dark:text-secondary-400">
                                                    123 Developer Street<br>
                                                    Tech District<br>
                                                    San Francisco, CA 94107
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex items-start gap-3">
                                            <x-ui.ionicon
                                                class="mt-1 h-5 w-5 text-secondary-600 dark:text-secondary-400"
                                                icon="call-outline" />
                                            <div>
                                                <p
                                                    class="text-sm font-medium text-secondary-900 dark:text-secondary-100">
                                                    Phone</p>
                                                <p class="mt-1 text-sm text-secondary-600 dark:text-secondary-400">
                                                    +1 (555) 123-4567</p>
                                            </div>
                                        </div>
                                        <div class="flex items-start gap-3">
                                            <x-ui.ionicon
                                                class="mt-1 h-5 w-5 text-secondary-600 dark:text-secondary-400"
                                                icon="mail-outline" />
                                            <div>
                                                <p
                                                    class="text-sm font-medium text-secondary-900 dark:text-secondary-100">
                                                    Email</p>
                                                <p class="mt-1 text-sm text-secondary-600 dark:text-secondary-400">
                                                    contact@company.com</p>
                                            </div>
                                        </div>
                                        <div class="flex items-start gap-3">
                                            <x-ui.ionicon
                                                class="mt-1 h-5 w-5 text-secondary-600 dark:text-secondary-400"
                                                icon="time-outline" />
                                            <div>
                                                <p
                                                    class="text-sm font-medium text-secondary-900 dark:text-secondary-100">
                                                    Business Hours</p>
                                                <p class="mt-1 text-sm text-secondary-600 dark:text-secondary-400">
                                                    Monday - Friday: 9:00 AM - 6:00 PM<br>
                                                    Saturday: 10:00 AM - 4:00 PM<br>
                                                    Sunday: Closed
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Contact Form Column -->
                            <div class="p-6">
                                <form class="space-y-5">
                                    <div>
                                        <label class="mb-2 block text-sm text-secondary-700 dark:text-secondary-400"
                                            for="name">Name</label>
                                        <input
                                            class="w-full rounded-md border border-secondary-300 bg-white px-4 py-2.5 text-sm text-secondary-900 transition-colors placeholder:text-secondary-500 hover:border-secondary-400 focus:border-secondary-500 focus:outline-none focus:ring-1 focus:ring-secondary-500 dark:border-secondary-800 dark:bg-secondary-950 dark:text-secondary-100 dark:placeholder:text-secondary-600 dark:hover:border-secondary-700 dark:focus:border-secondary-600 dark:focus:ring-secondary-600"
                                            id="name" placeholder="Your name" type="text">
                                    </div>
                                    <div>
                                        <label class="mb-2 block text-sm text-secondary-700 dark:text-secondary-400"
                                            for="email">Email</label>
                                        <input
                                            class="w-full rounded-md border border-secondary-300 bg-white px-4 py-2.5 text-sm text-secondary-900 transition-colors placeholder:text-secondary-500 hover:border-secondary-400 focus:border-secondary-500 focus:outline-none focus:ring-1 focus:ring-secondary-500 dark:border-secondary-800 dark:bg-secondary-950 dark:text-secondary-100 dark:placeholder:text-secondary-600 dark:hover:border-secondary-700 dark:focus:border-secondary-600 dark:focus:ring-secondary-600"
                                            id="email" placeholder="your@email.com" type="email">
                                    </div>
                                    <div>
                                        <label class="mb-2 block text-sm text-secondary-700 dark:text-secondary-400"
                                            for="subject">Subject</label>
                                        <input
                                            class="w-full rounded-md border border-secondary-300 bg-white px-4 py-2.5 text-sm text-secondary-900 transition-colors placeholder:text-secondary-500 hover:border-secondary-400 focus:border-secondary-500 focus:outline-none focus:ring-1 focus:ring-secondary-500 dark:border-secondary-800 dark:bg-secondary-950 dark:text-secondary-100 dark:placeholder:text-secondary-600 dark:hover:border-secondary-700 dark:focus:border-secondary-600 dark:focus:ring-secondary-600"
                                            id="subject" placeholder="What's this about?" type="text">
                                    </div>
                                    <div>
                                        <label class="mb-2 block text-sm text-secondary-700 dark:text-secondary-400"
                                            for="message">Message</label>
                                        <textarea
                                            class="w-full rounded-md border border-secondary-300 bg-white px-4 py-2.5 text-sm text-secondary-900 transition-colors placeholder:text-secondary-500 hover:border-secondary-400 focus:border-secondary-500 focus:outline-none focus:ring-1 focus:ring-secondary-500 dark:border-secondary-800 dark:bg-secondary-950 dark:text-secondary-100 dark:placeholder:text-secondary-600 dark:hover:border-secondary-700 dark:focus:border-secondary-600 dark:focus:ring-secondary-600"
                                            id="message" placeholder="Your message" rows="4"></textarea>
                                    </div>
                                    <button
                                        class="w-full rounded-md border border-secondary-300 bg-white px-4 py-2.5 text-sm font-medium text-secondary-900 transition-colors hover:border-secondary-400 hover:bg-secondary-50 focus:outline-none focus:ring-2 focus:ring-secondary-500 focus:ring-offset-2 dark:border-secondary-800 dark:bg-secondary-950 dark:text-secondary-100 dark:hover:border-secondary-700 dark:hover:bg-secondary-900 dark:focus:ring-secondary-600 dark:focus:ring-offset-secondary-950"
                                        type="submit">
                                        Send message
                                    </button>
                                </form>
                            </div>
                        </div>
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

            // Initialize active tab from localStorage or default to repositories
            document.addEventListener('DOMContentLoaded', function() {
                const savedTab = localStorage.getItem('activeTab') || 'repositories';
                switchTab(savedTab);
            });
        </script>
    </body>

</html>
