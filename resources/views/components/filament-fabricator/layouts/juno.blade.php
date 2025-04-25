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
                border-bottom: 2px solid transparent;
            }

            .tab-button.active-tab {
                border-bottom-color: currentColor;
                background-color: rgba(0, 0, 0, 0.04);
            }

            .dark .tab-button.active-tab {
                background-color: rgba(255, 255, 255, 0.04);
            }

            @media (min-width: 768px) {
                .tab-button {
                    border-bottom: none;
                    border-left: 2px solid transparent;
                }

                .tab-button.active-tab {
                    border-left-color: currentColor;
                    border-bottom-color: transparent;
                }
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
                <x-themes.juno.profile />
            </div>

            <!-- Tabs System -->
            <div class="flex flex-col pt-6 md:flex-row">
                <!-- Tabs Header -->
                <div
                    class="mb-6 flex min-w-0 space-x-4 overflow-x-auto border-b border-secondary-200 pr-0 dark:border-secondary-800 md:mb-12 md:min-w-[120px] md:flex-col md:space-x-0 md:space-y-2 md:border-b-0 md:pr-8">
                    <button
                        class="tab-button active-tab whitespace-nowrap px-3 py-2 text-left text-xs text-secondary-900 dark:text-secondary-100"
                        id="repositories-tab" onclick="switchTab('repositories')">
                        Repositories
                    </button>
                    <button
                        class="tab-button whitespace-nowrap px-3 py-2 text-left text-xs text-secondary-500 transition-colors hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-secondary-100"
                        id="projects-tab" onclick="switchTab('projects')">
                        Projects
                    </button>
                    <button
                        class="tab-button whitespace-nowrap px-3 py-2 text-left text-xs text-secondary-500 transition-colors hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-secondary-100"
                        id="notes-tab" onclick="switchTab('notes')">
                        Notes
                    </button>
                    <button
                        class="tab-button whitespace-nowrap px-3 py-2 text-left text-xs text-secondary-500 transition-colors hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-secondary-100"
                        id="about-tab" onclick="switchTab('about')">
                        About Me
                    </button>
                    <button
                        class="tab-button whitespace-nowrap px-3 py-2 text-left text-xs text-secondary-500 transition-colors hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-secondary-100"
                        id="contact-tab" onclick="switchTab('contact')">
                        Contact
                    </button>
                </div>

                <!-- Tabs Content -->
                <div class="tab-content flex-1 md:pl-12">
                    <!-- Repositories Tab -->
                    <x-themes.juno.repositories :githubUser="'mviniciusca'" :repoQuantity="9" />

                    <!-- Projects Tab -->
                    <div class="tab-pane hidden" id="projects-content">
                        <x-themes.juno.projects />
                    </div>

                    <!-- Notes Tab -->
                    <div class="tab-pane hidden" id="notes-content">
                        <div class="mb-8 flex items-center justify-between">
                            <div>
                                <h2 class="text-base font-medium text-secondary-900 dark:text-secondary-100">Latest
                                    Articles</h2>
                                <p class="cdark:text-secondary-400 mt-1 text-xs text-secondary-600">Thoughts and
                                    tutorials on development, design, and technology</p>
                            </div>
                            <a class="inline-flex items-center gap-2 rounded-md border border-secondary-300 bg-white px-4 py-2 text-sm font-medium text-secondary-900 transition-colors hover:border-secondary-400 hover:bg-secondary-50 focus:outline-none focus:ring-2 focus:ring-secondary-500 focus:ring-offset-2 dark:border-secondary-800 dark:bg-secondary-950 dark:text-secondary-100 dark:hover:border-secondary-700 dark:hover:bg-secondary-900 dark:focus:ring-secondary-600 dark:focus:ring-offset-secondary-950"
                                href="/blog">
                                <x-ui.ionicon class="h-5 w-5" icon="newspaper-outline" />
                                View All Articles
                            </a>
                        </div>
                        <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-3">
                            <article
                                class="group overflow-hidden rounded-lg border border-secondary-200 bg-white p-4 transition-all hover:border-secondary-300 dark:border-secondary-800/50 dark:bg-secondary-900/50">
                                <div class="flex flex-col">
                                    <div class="flex items-center justify-between text-xs">
                                        <span class="text-secondary-500 dark:text-secondary-400">April 24, 2025</span>
                                        <span
                                            class="rounded-full border border-secondary-200 px-2 py-0.5 dark:border-secondary-800">Development</span>
                                    </div>
                                    <h3 class="mt-2 text-sm font-medium text-secondary-900 dark:text-secondary-100">
                                        Building Modern Web Applications with React and TypeScript</h3>
                                    <p class="mt-2 line-clamp-2 text-xs text-secondary-600 dark:text-secondary-400">
                                        Explore the powerful combination of React and TypeScript for building robust web
                                        applications.</p>
                                    <a class="mt-3 inline-flex items-center text-xs font-medium text-secondary-900 hover:text-secondary-700 dark:text-secondary-100 dark:hover:text-secondary-300"
                                        href="#">
                                        Read more
                                        <svg class="ml-1 h-3 w-3" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </article>

                            <article
                                class="group overflow-hidden rounded-lg border border-secondary-200 bg-white p-4 transition-all hover:border-secondary-300 dark:border-secondary-800/50 dark:bg-secondary-900/50">
                                <div class="flex flex-col">
                                    <div class="flex items-center justify-between text-xs">
                                        <span class="text-secondary-500 dark:text-secondary-400">April 20, 2025</span>
                                        <span
                                            class="rounded-full border border-secondary-200 px-2 py-0.5 dark:border-secondary-800">DevOps</span>
                                    </div>
                                    <h3 class="mt-2 text-sm font-medium text-secondary-900 dark:text-secondary-100">
                                        Docker and Kubernetes: A Practical Guide</h3>
                                    <p class="mt-2 line-clamp-2 text-xs text-secondary-600 dark:text-secondary-400">Deep
                                        dive into containerization and orchestration. Learn how to deploy, scale, and
                                        manage applications using Docker and Kubernetes.</p>
                                    <a class="mt-3 inline-flex items-center text-xs font-medium text-secondary-900 hover:text-secondary-700 dark:text-secondary-100 dark:hover:text-secondary-300"
                                        href="#">
                                        Read more
                                        <svg class="ml-1 h-3 w-3" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </article>

                            <article
                                class="group overflow-hidden rounded-lg border border-secondary-200 bg-white p-4 transition-all hover:border-secondary-300 dark:border-secondary-800/50 dark:bg-secondary-900/50">
                                <div class="flex flex-col">
                                    <div class="flex items-center justify-between text-xs">
                                        <span class="text-secondary-500 dark:text-secondary-400">April 15, 2025</span>
                                        <span
                                            class="rounded-full border border-secondary-200 px-2 py-0.5 dark:border-secondary-800">Security</span>
                                    </div>
                                    <h3 class="mt-2 text-sm font-medium text-secondary-900 dark:text-secondary-100">Web
                                        Security Best Practices for Modern Applications</h3>
                                    <p class="mt-2 line-clamp-2 text-xs text-secondary-600 dark:text-secondary-400">
                                        Essential security practices for protecting web applications. From XSS
                                        prevention to CSRF protection, learn how to keep your applications secure.</p>
                                    <a class="mt-3 inline-flex items-center text-xs font-medium text-secondary-900 hover:text-secondary-700 dark:text-secondary-100 dark:hover:text-secondary-300"
                                        href="#">
                                        Read more
                                        <svg class="ml-1 h-3 w-3" fill="none" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </article>
                        </div>
                    </div>

                    <!-- About Tab -->
                    <div class="tab-pane hidden" id="about-content">
                        <div class="mb-8">
                            <h2 class="text-base font-medium text-secondary-900 dark:text-secondary-100">About Me
                            </h2>
                            <p class="mt-1 text-xs text-secondary-600 dark:text-secondary-400">Full-stack developer
                                exploring the digital frontier</p>
                        </div>
                        <div class="grid gap-8 md:grid-cols-2">
                            <!-- Bio Column -->
                            <div class="space-y-6">
                                <div class="rounded-lg p-6">
                                    <h3 class="text-sm font-medium text-secondary-900 dark:text-secondary-100">bio
                                    </h3>
                                    <div class="mt-4 space-y-4 text-sm text-secondary-600 dark:text-secondary-400">
                                        <p>Full Stack Explorer navigating the digital cosmos</p>

                                        <div>
                                            <p class="mb-2">Currently orbiting:</p>
                                            <ul class="space-y-1 pl-4">
                                                <li>• Backend Engineering with Laravel</li>
                                                <li>• Frontend Development with React</li>
                                                <li>• System Architecture Design</li>
                                                <li>• Performance Optimization</li>
                                            </ul>
                                        </div>

                                        <div>
                                            <p class="mb-2">Mission Control:</p>
                                            <ul class="space-y-1 pl-4">
                                                <li>• TypeScript & JavaScript</li>
                                                <li>• PHP & Python</li>
                                                <li>• Docker & AWS</li>
                                                <li>• Git Version Control</li>
                                            </ul>
                                        </div>

                                        <p>Transforming coffee into code since 2015</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Education Timeline Column -->
                            <div class="space-y-6">
                                <div class="rounded-lg">
                                    <h3 class="text-sm font-medium text-secondary-900 dark:text-secondary-100">
                                        certifications & courses</h3>
                                </div>
                                <div class="relative">
                                    <div class="space-y-4">
                                        <!-- Timeline Item 1 -->
                                        <div class="relative ml-8">
                                            <div
                                                class="rounded-lg border border-secondary-200 p-4 dark:border-secondary-800">
                                                <span
                                                    class="text-xs font-medium text-secondary-500 dark:text-secondary-400">2023
                                                    - 2024</span>
                                                <h3
                                                    class="mt-1 text-sm font-medium text-secondary-900 dark:text-secondary-100">
                                                    AWS Cloud Practitioner</h3>
                                                <p class="mt-1 text-xs text-secondary-600 dark:text-secondary-400">
                                                    Amazon
                                                    Web Services</p>
                                                <span
                                                    class="mt-2 inline-flex items-center rounded-lg border border-green-200 px-2 py-0.5 text-xs font-medium text-green-600 dark:border-green-900 dark:text-green-400">
                                                    <x-ui.ionicon class="mr-1" icon="checkmark-circle-outline" />
                                                    Completed
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Timeline Item 2 -->
                                        <div class="relative ml-8">
                                            <div
                                                class="rounded-lg border border-secondary-200 p-4 dark:border-secondary-800">
                                                <span
                                                    class="text-xs font-medium text-secondary-500 dark:text-secondary-400">2024</span>
                                                <h3
                                                    class="mt-1 text-sm font-medium text-secondary-900 dark:text-secondary-100">
                                                    Laravel Advanced Concepts</h3>
                                                <p class="mt-1 text-xs text-secondary-600 dark:text-secondary-400">
                                                    Laravel
                                                    Academy</p>
                                                <span
                                                    class="mt-2 inline-flex items-center rounded-lg border border-yellow-200 px-2 py-0.5 text-xs font-medium text-yellow-600 dark:border-yellow-900 dark:text-yellow-400">
                                                    <x-ui.ionicon class="mr-1" icon="time-outline" />
                                                    In Progress
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Timeline Item 3 -->
                                        <div class="relative ml-8">
                                            <div
                                                class="rounded-lg border border-secondary-200 p-4 dark:border-secondary-800">
                                                <span
                                                    class="text-xs font-medium text-secondary-500 dark:text-secondary-400">2024</span>
                                                <h3
                                                    class="mt-1 text-sm font-medium text-secondary-900 dark:text-secondary-100">
                                                    Vue.js 3 Masterclass</h3>
                                                <p class="mt-1 text-xs text-secondary-600 dark:text-secondary-400">
                                                    Vue
                                                    School</p>
                                                <span
                                                    class="mt-2 inline-flex items-center rounded-lg border border-blue-200 px-2 py-0.5 text-xs font-medium text-blue-600 dark:border-blue-900 dark:text-blue-400">
                                                    <x-ui.ionicon class="mr-1" icon="calendar-outline" />
                                                    Upcoming
                                                </span>
                                            </div>
                                        </div>

                                        <!-- Timeline Item 4 -->
                                        <div class="relative ml-8">
                                            <div
                                                class="rounded-lg border border-secondary-200 p-4 dark:border-secondary-800">
                                                <span
                                                    class="text-xs font-medium text-secondary-500 dark:text-secondary-400">2024</span>
                                                <h3
                                                    class="mt-1 text-sm font-medium text-secondary-900 dark:text-secondary-100">
                                                    React Native for Mobile Development</h3>
                                                <p class="mt-1 text-xs text-secondary-600 dark:text-secondary-400">
                                                    React
                                                    Training</p>
                                                <span
                                                    class="mt-2 inline-flex items-center rounded-lg border border-red-200 px-2 py-0.5 text-xs font-medium text-red-600 dark:border-red-900 dark:text-red-400">
                                                    <x-ui.ionicon class="mr-1" icon="close-circle-outline" />
                                                    Cancelled
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                <x-newsletter.section :show_light="false" />
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
