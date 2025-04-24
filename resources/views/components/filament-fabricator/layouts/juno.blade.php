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
                border-bottom: 1px solid transparent;
                margin-bottom: -1px;
            }

            .tab-button.active-tab {
                border-bottom-color: currentColor;
            }
        </style>
    </head>

    <body
        class="border border-secondary-200 font-sans antialiased transition-colors duration-200 dark:border-zinc-800 dark:bg-zinc-950">
        <x-ui.background />
        <x-header.section />
        <div class="container mx-auto max-w-4xl px-4 py-8">

            <!-- Profile Section with generous top space -->
            <div class="mb-12 mt-16">
                <x-profile :showCompany="false" :showEmail="false"
                    avatarClass="mb-6 h-24 w-24 overflow-hidden rounded-full border-2 border-zinc-800 dark:border-zinc-800 md:h-32 md:w-32 object-cover"
                    containerClass="max-w-2xl mx-auto"
                    downloadButtonClass="inline-flex items-center gap-2 rounded-md border border-zinc-800 px-4 py-2 hover:border-zinc-700 dark:border-zinc-800/50 dark:hover:border-zinc-700 transition-colors"
                    infoContainerClass="space-y-2"
                    infoItemClass="flex items-center justify-center gap-2 text-sm dark:text-zinc-400"
                    jobPositionClass="mt-2 text-sm dark:text-zinc-400"
                    nameClass="text-lg font-medium dark:text-zinc-100"
                    skillItemClass="rounded-md border border-zinc-800 px-2 py-1 text-xs dark:border-zinc-800/50"
                    skillsContainerClass="max-w-lg mx-auto" socialContainerClass="space-x-4" />
            </div>

            <!-- Tabs System -->
            <div class="pt-6">
                <!-- Tabs Header -->
                <div class="mb-8 flex justify-center space-x-8 border-b border-secondary-200 dark:border-secondary-800">
                    <button
                        class="tab-button active-tab px-4 pb-2 text-sm font-medium text-secondary-900 dark:text-secondary-100"
                        id="repositories-tab" onclick="switchTab('repositories')">
                        Repositories
                    </button>
                    <button
                        class="tab-button px-4 pb-2 text-sm font-medium text-secondary-500 transition-colors hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-secondary-100"
                        id="notes-tab" onclick="switchTab('notes')">
                        Notes
                    </button>
                    <button
                        class="tab-button px-4 pb-2 text-sm font-medium text-secondary-500 transition-colors hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-secondary-100"
                        id="about-tab" onclick="switchTab('about')">
                        About Me
                    </button>
                    <button
                        class="tab-button px-4 pb-2 text-sm font-medium text-secondary-500 transition-colors hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-secondary-100"
                        id="contact-tab" onclick="switchTab('contact')">
                        Contact
                    </button>
                </div>

                <!-- Tabs Content -->
                <div class="tab-content">
                    <!-- Repositories Tab -->
                    <div class="tab-pane active" id="repositories-content">
                        <div class="grid grid-cols-2 gap-1 md:grid-cols-3 md:gap-2">
                            <!-- Repository Grid Content -->
                            <!-- Repository 1 -->
                            <a class="flex aspect-square flex-col justify-between border border-secondary-200 p-4 transition-colors hover:border-secondary-300 dark:border-zinc-800/50 dark:bg-zinc-900/50 dark:hover:border-zinc-700"
                                href="#">
                                <div>
                                    <h3 class="text-sm font-medium dark:text-secondary-100">project-name</h3>
                                    <p class="mt-1 line-clamp-3 text-xs dark:text-secondary-400">A brief description
                                        of the project and what it does.</p>
                                </div>
                                <div class="mt-2 flex items-center justify-between">
                                    <div class="flex items-center space-x-2">
                                        <span class="text-xs dark:text-secondary-500">
                                            <svg class="inline h-3 w-3" fill="none" height="16"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                stroke="currentColor" viewBox="0 0 24 24" width="16"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <polygon
                                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                </polygon>
                                            </svg>
                                            24
                                        </span>
                                        <span class="text-xs dark:text-secondary-500">
                                            <svg class="inline h-3 w-3" fill="none" height="16"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                stroke="currentColor" viewBox="0 0 24 24" width="16"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="6" x2="6" y1="3" y2="15">
                                                </line>
                                                <circle cx="18" cy="6" r="3"></circle>
                                                <circle cx="6" cy="18" r="3"></circle>
                                                <path d="M18 9a9 9 0 0 1-9 9"></path>
                                            </svg>
                                            8
                                        </span>
                                    </div>
                                    <span
                                        class="rounded bg-secondary-200 px-1.5 py-0.5 text-xs dark:bg-secondary-700">JS</span>
                                </div>
                            </a>

                            <!-- Repository 2 -->
                            <a class="flex aspect-square flex-col justify-between border border-secondary-200 p-4 transition-colors hover:border-secondary-300 dark:border-zinc-800/50 dark:bg-zinc-900/50 dark:hover:border-zinc-700"
                                href="#">
                                <div>
                                    <h3 class="text-sm font-medium dark:text-secondary-100">react-app</h3>
                                    <p class="mt-1 line-clamp-3 text-xs dark:text-secondary-400">A React
                                        application
                                        with modern features and clean code.</p>
                                </div>
                                <div class="mt-2 flex items-center justify-between">
                                    <div class="flex items-center space-x-2">
                                        <span class="text-xs dark:text-secondary-500">
                                            <svg class="inline h-3 w-3" fill="none" height="16"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                stroke="currentColor" viewBox="0 0 24 24" width="16"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <polygon
                                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                </polygon>
                                            </svg>
                                            42
                                        </span>
                                        <span class="text-xs dark:text-secondary-500">
                                            <svg class="inline h-3 w-3" fill="none" height="16"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                stroke="currentColor" viewBox="0 0 24 24" width="16"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="6" x2="6" y1="3" y2="15">
                                                </line>
                                                <circle cx="18" cy="6" r="3"></circle>
                                                <circle cx="6" cy="18" r="3"></circle>
                                                <path d="M18 9a9 9 0 0 1-9 9"></path>
                                            </svg>
                                            12
                                        </span>
                                    </div>
                                    <span
                                        class="rounded bg-secondary-200 px-1.5 py-0.5 text-xs dark:bg-secondary-700">React</span>
                                </div>
                            </a>

                            <!-- Repository 3 -->
                            <a class="flex aspect-square flex-col justify-between border border-secondary-200 p-4 transition-colors hover:border-secondary-300 dark:border-zinc-800/50 dark:bg-zinc-900/50 dark:hover:border-zinc-700"
                                href="#">
                                <div>
                                    <h3 class="text-sm font-medium dark:text-secondary-100">api-service</h3>
                                    <p class="mt-1 line-clamp-3 text-xs dark:text-secondary-400">RESTful API
                                        service
                                        built with Node.js and Express.</p>
                                </div>
                                <div class="mt-2 flex items-center justify-between">
                                    <div class="flex items-center space-x-2">
                                        <span class="text-xs dark:text-secondary-500">
                                            <svg class="inline h-3 w-3" fill="none" height="16"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                stroke="currentColor" viewBox="0 0 24 24" width="16"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <polygon
                                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                </polygon>
                                            </svg>
                                            18
                                        </span>
                                        <span class="text-xs dark:text-secondary-500">
                                            <svg class="inline h-3 w-3" fill="none" height="16"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                stroke="currentColor" viewBox="0 0 24 24" width="16"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="6" x2="6" y1="3" y2="15">
                                                </line>
                                                <circle cx="18" cy="6" r="3"></circle>
                                                <circle cx="6" cy="18" r="3"></circle>
                                                <path d="M18 9a9 9 0 0 1-9 9"></path>
                                            </svg>
                                            5
                                        </span>
                                    </div>
                                    <span
                                        class="rounded bg-secondary-200 px-1.5 py-0.5 text-xs dark:bg-secondary-700">Node</span>
                                </div>
                            </a>

                            <!-- Repository 4 -->
                            <a class="flex aspect-square flex-col justify-between border border-secondary-200 p-4 transition-colors hover:border-secondary-300 dark:border-zinc-800/50 dark:bg-zinc-900/50 dark:hover:border-zinc-700"
                                href="#">
                                <div>
                                    <h3 class="text-sm font-medium dark:text-secondary-100">ui-components</h3>
                                    <p class="mt-1 line-clamp-3 text-xs dark:text-secondary-400">A library of
                                        reusable
                                        UI components built with React and Tailwind.</p>
                                </div>
                                <div class="mt-2 flex items-center justify-between">
                                    <div class="flex items-center space-x-2">
                                        <span class="text-xs dark:text-secondary-500">
                                            <svg class="inline h-3 w-3" fill="none" height="16"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                stroke="currentColor" viewBox="0 0 24 24" width="16"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <polygon
                                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                </polygon>
                                            </svg>
                                            56
                                        </span>
                                        <span class="text-xs dark:text-secondary-500">
                                            <svg class="inline h-3 w-3" fill="none" height="16"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                stroke="currentColor" viewBox="0 0 24 24" width="16"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="6" x2="6" y1="3" y2="15">
                                                </line>
                                                <circle cx="18" cy="6" r="3"></circle>
                                                <circle cx="6" cy="18" r="3"></circle>
                                                <path d="M18 9a9 9 0 0 1-9 9"></path>
                                            </svg>
                                            22
                                        </span>
                                    </div>
                                    <span
                                        class="rounded bg-secondary-200 px-1.5 py-0.5 text-xs dark:bg-secondary-700">TS</span>
                                </div>
                            </a>

                            <!-- Repository 5 -->
                            <a class="flex aspect-square flex-col justify-between border border-secondary-200 p-4 transition-colors hover:border-secondary-300 dark:border-zinc-800/50 dark:bg-zinc-900/50 dark:hover:border-zinc-700"
                                href="#">
                                <div>
                                    <h3 class="text-sm font-medium dark:text-secondary-100">data-viz</h3>
                                    <p class="mt-1 line-clamp-3 text-xs dark:text-secondary-400">Data
                                        visualization
                                        tools and components for web applications.</p>
                                </div>
                                <div class="mt-2 flex items-center justify-between">
                                    <div class="flex items-center space-x-2">
                                        <span class="text-xs dark:text-secondary-500">
                                            <svg class="inline h-3 w-3" fill="none" height="16"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                stroke="currentColor" viewBox="0 0 24 24" width="16"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <polygon
                                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                </polygon>
                                            </svg>
                                            32
                                        </span>
                                        <span class="text-xs dark:text-secondary-500">
                                            <svg class="inline h-3 w-3" fill="none" height="16"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                stroke="currentColor" viewBox="0 0 24 24" width="16"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="6" x2="6" y1="3" y2="15">
                                                </line>
                                                <circle cx="18" cy="6" r="3"></circle>
                                                <circle cx="6" cy="18" r="3"></circle>
                                                <path d="M18 9a9 9 0 0 1-9 9"></path>
                                            </svg>
                                            14
                                        </span>
                                    </div>
                                    <span
                                        class="rounded bg-secondary-200 px-1.5 py-0.5 text-xs dark:bg-secondary-700">JS</span>
                                </div>
                            </a>

                            <!-- Repository 6 -->
                            <a class="flex aspect-square flex-col justify-between border border-secondary-200 p-4 transition-colors hover:border-secondary-300 dark:border-zinc-800/50 dark:bg-zinc-900/50 dark:hover:border-zinc-700"
                                href="#">
                                <div>
                                    <h3 class="text-sm font-medium dark:text-secondary-100">cli-tools</h3>
                                    <p class="mt-1 line-clamp-3 text-xs dark:text-secondary-400">Command-line
                                        tools
                                        for developer productivity and automation.</p>
                                </div>
                                <div class="mt-2 flex items-center justify-between">
                                    <div class="flex items-center space-x-2">
                                        <span class="text-xs dark:text-secondary-500">
                                            <svg class="inline h-3 w-3" fill="none" height="16"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                stroke="currentColor" viewBox="0 0 24 24" width="16"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <polygon
                                                    points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                </polygon>
                                            </svg>
                                            15
                                        </span>
                                        <span class="text-xs dark:text-secondary-500">
                                            <svg class="inline h-3 w-3" fill="none" height="16"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                stroke="currentColor" viewBox="0 0 24 24" width="16"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="6" x2="6" y1="3" y2="15">
                                                </line>
                                                <circle cx="18" cy="6" r="3"></circle>
                                                <circle cx="6" cy="18" r="3"></circle>
                                                <path d="M18 9a9 9 0 0 1-9 9"></path>
                                            </svg>
                                            7
                                        </span>
                                    </div>
                                    <span
                                        class="rounded bg-secondary-200 px-1.5 py-0.5 text-xs dark:bg-secondary-700">TS</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Notes Tab -->
                    <div class="tab-pane hidden" id="notes-content">
                        <div class="mx-auto max-w-2xl space-y-4">
                            <article
                                class="overflow-hidden rounded-md border border-secondary-200 transition-all hover:border-secondary-300 dark:border-zinc-800/50 dark:bg-zinc-900/50">
                                <div class="p-4">
                                    <div class="flex items-center justify-between">
                                        <span class="text-xs text-zinc-500 dark:text-zinc-400">April 24, 2025</span>
                                        <span
                                            class="inline-flex items-center rounded-full border border-zinc-200 px-2 py-0.5 text-xs dark:border-zinc-800">
                                            Blog
                                        </span>
                                    </div>
                                    <h3 class="mt-2 text-sm font-medium text-zinc-900 dark:text-zinc-100">
                                        Hello World: My first note
                                    </h3>
                                    <p class="mt-1 line-clamp-2 text-xs text-zinc-600 dark:text-zinc-400">
                                        This is an example note for your new portfolio. Here you can share your ideas,
                                        tutorials, news, and much more.
                                    </p>
                                    <div class="mt-3">
                                        <a class="inline-flex items-center text-xs font-medium text-zinc-900 hover:text-zinc-700 dark:text-zinc-100 dark:hover:text-zinc-300"
                                            href="#">
                                            Read more
                                            <svg class="ml-1 h-3 w-3" fill="none" height="24"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                stroke="currentColor" viewBox="0 0 24 24" width="24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M5 12h14"></path>
                                                <path d="M12 5l7 7-7 7"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>

                    <!-- About Tab -->
                    <div class="tab-pane hidden" id="about-content">
                        <div class="prose prose-secondary dark:prose-invert mx-auto">
                            <div class="p-6">
                                <h3 class="mb-4 text-sm font-medium text-secondary-900 dark:text-zinc-100">about.me
                                </h3>
                                <div class="space-y-4 text-sm text-secondary-600 dark:text-zinc-400">
                                    <p>🚀 Full Stack Explorer navigating the digital cosmos</p>

                                    <p>Currently orbiting:</p>
                                    <ul class="space-y-1 pl-4">
                                        <li>• Backend Engineering with Laravel</li>
                                        <li>• Frontend Development with React</li>
                                        <li>• System Architecture Design</li>
                                        <li>• Performance Optimization</li>
                                    </ul>

                                    <p>Mission Control:</p>
                                    <ul class="space-y-1 pl-4">
                                        <li>• TypeScript & JavaScript</li>
                                        <li>• PHP & Python</li>
                                        <li>• Docker & AWS</li>
                                        <li>• Git Version Control</li>
                                    </ul>

                                    <p>✨ Currently charting new territories in:</p>
                                    <ul class="space-y-1 pl-4">
                                        <li>• Machine Learning</li>
                                        <li>• Web3 Technologies</li>
                                        <li>• Cloud Architecture</li>
                                    </ul>

                                    <p>⚡ Ground Control: Transforming coffee into code since 2015</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Tab -->
                    <div class="tab-pane hidden" id="contact-content">
                        <div class="mx-auto max-w-lg">
                            <div class="rounded-lg p-6">
                                <h3 class="mb-6 text-sm font-medium text-secondary-900 dark:text-secondary-100">Get in
                                    touch</h3>
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

            <!-- Footer -->
            <footer class="mt-12 py-6">
                <div
                    class="flex flex-col items-center justify-between gap-4 text-xs text-secondary-500 dark:text-zinc-400">
                    <p>© 2024 Developer Portfolio. All rights reserved.</p>
                    <div class="flex items-center gap-4">
                        <a class="hover:text-zinc-300" href="#">Terms</a>
                        <a class="hover:text-zinc-300" href="#">Privacy</a>
                        <a class="hover:text-zinc-300" href="#">Contact</a>
                    </div>
                </div>
            </footer>
        </div>
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
                });

                // Remove active class from all tab buttons
                document.querySelectorAll('.tab-button').forEach(function(tabButton) {
                    tabButton.classList.remove('active-tab');
                });

                // Show the selected tab pane
                document.getElementById(tabName + '-content').classList.remove('hidden');

                // Add active class to the clicked tab button
                const activeTab = document.getElementById(tabName + '-tab');
                activeTab.classList.add('active-tab');

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
