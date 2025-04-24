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
    </head>

    <body
        class="bg-zinc-50 font-sans text-zinc-800 antialiased transition-colors duration-200 dark:bg-zinc-900 dark:text-zinc-200">
        <x-ui.background />
        <x-header.section />
        <div class="container mx-auto max-w-3xl px-4 py-8">
            {{-- <!-- Dark Mode Toggle -->
            <div class="absolute right-4 top-4">
                <button class="rounded-full bg-zinc-200 p-2 text-zinc-700 dark:bg-zinc-800 dark:text-zinc-300"
                    id="theme-toggle">
                    <!-- Sun icon for dark mode -->
                    <svg class="hidden h-5 w-5 dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                    </svg>
                    <!-- Moon icon for light mode -->
                    <svg class="block h-5 w-5 dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                    </svg>
                </button>
            </div> --}}

            <!-- Profile Section with generous top space -->
            <div class="mb-12 mt-16">
                <x-profile :showCompany="false" :showEmail="false"
                    avatarClass="mb-6 h-24 w-24 overflow-hidden rounded-full border-2 border-zinc-200 dark:border-zinc-700 md:h-32 md:w-32 object-cover"
                    containerClass="max-w-2xl mx-auto"
                    downloadButtonClass="inline-flex items-center gap-2 rounded-md bg-zinc-100 px-4 py-2 text-sm text-zinc-700 hover:bg-zinc-200 dark:bg-zinc-800 dark:text-zinc-300 dark:hover:bg-zinc-700 transition-colors"
                    infoContainerClass="space-y-2"
                    infoItemClass="flex items-center justify-center gap-2 text-sm text-zinc-600 dark:text-zinc-400"
                    jobPositionClass="mt-2 text-sm text-zinc-600 dark:text-zinc-400"
                    nameClass="text-lg font-medium text-zinc-900 dark:text-zinc-100"
                    skillItemClass="rounded-md bg-zinc-100 px-2 py-1 text-xs text-zinc-700 dark:bg-zinc-800 dark:text-zinc-300"
                    skillsContainerClass="max-w-lg mx-auto" socialContainerClass="space-x-4" />
            </div>

            <!-- Repository Grid (Instagram-style) -->
            <div class="border-t border-zinc-200 pt-6 dark:border-zinc-700">
                <!-- Grid Header -->
                <div class="mb-6 flex justify-center">
                    <button
                        class="border-t-2 border-zinc-900 px-4 pt-1 text-xs font-medium text-zinc-900 dark:border-zinc-100 dark:text-zinc-100">Repositories</button>
                </div>

                <!-- Grid Layout -->
                <div class="grid grid-cols-2 gap-1 md:grid-cols-3 md:gap-2">
                    <!-- Repository 1 -->
                    <a class="flex aspect-square flex-col justify-between bg-zinc-100 p-4 transition-colors hover:bg-zinc-200 dark:bg-zinc-800 dark:hover:bg-zinc-700"
                        href="#">
                        <div>
                            <h3 class="text-sm font-medium text-zinc-900 dark:text-zinc-100">project-name</h3>
                            <p class="mt-1 line-clamp-3 text-xs text-zinc-600 dark:text-zinc-400">A brief description
                                of the project and what it does.</p>
                        </div>
                        <div class="mt-2 flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <span class="text-xs text-zinc-500 dark:text-zinc-500">
                                    <svg class="inline h-3 w-3" fill="none" height="16" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                        viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    24
                                </span>
                                <span class="text-xs text-zinc-500 dark:text-zinc-500">
                                    <svg class="inline h-3 w-3" fill="none" height="16" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                        viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                                        <line x1="6" x2="6" y1="3" y2="15"></line>
                                        <circle cx="18" cy="6" r="3"></circle>
                                        <circle cx="6" cy="18" r="3"></circle>
                                        <path d="M18 9a9 9 0 0 1-9 9"></path>
                                    </svg>
                                    8
                                </span>
                            </div>
                            <span
                                class="rounded bg-zinc-200 px-1.5 py-0.5 text-xs text-zinc-700 dark:bg-zinc-700 dark:text-zinc-300">JS</span>
                        </div>
                    </a>

                    <!-- Repository 2 -->
                    <a class="flex aspect-square flex-col justify-between bg-zinc-100 p-4 transition-colors hover:bg-zinc-200 dark:bg-zinc-800 dark:hover:bg-zinc-700"
                        href="#">
                        <div>
                            <h3 class="text-sm font-medium text-zinc-900 dark:text-zinc-100">react-app</h3>
                            <p class="mt-1 line-clamp-3 text-xs text-zinc-600 dark:text-zinc-400">A React application
                                with modern features and clean code.</p>
                        </div>
                        <div class="mt-2 flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <span class="text-xs text-zinc-500 dark:text-zinc-500">
                                    <svg class="inline h-3 w-3" fill="none" height="16" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                        viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    42
                                </span>
                                <span class="text-xs text-zinc-500 dark:text-zinc-500">
                                    <svg class="inline h-3 w-3" fill="none" height="16" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                        viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                                        <line x1="6" x2="6" y1="3" y2="15"></line>
                                        <circle cx="18" cy="6" r="3"></circle>
                                        <circle cx="6" cy="18" r="3"></circle>
                                        <path d="M18 9a9 9 0 0 1-9 9"></path>
                                    </svg>
                                    12
                                </span>
                            </div>
                            <span
                                class="rounded bg-zinc-200 px-1.5 py-0.5 text-xs text-zinc-700 dark:bg-zinc-700 dark:text-zinc-300">React</span>
                        </div>
                    </a>

                    <!-- Repository 3 -->
                    <a class="flex aspect-square flex-col justify-between bg-zinc-100 p-4 transition-colors hover:bg-zinc-200 dark:bg-zinc-800 dark:hover:bg-zinc-700"
                        href="#">
                        <div>
                            <h3 class="text-sm font-medium text-zinc-900 dark:text-zinc-100">api-service</h3>
                            <p class="mt-1 line-clamp-3 text-xs text-zinc-600 dark:text-zinc-400">RESTful API service
                                built with Node.js and Express.</p>
                        </div>
                        <div class="mt-2 flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <span class="text-xs text-zinc-500 dark:text-zinc-500">
                                    <svg class="inline h-3 w-3" fill="none" height="16" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                        viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    18
                                </span>
                                <span class="text-xs text-zinc-500 dark:text-zinc-500">
                                    <svg class="inline h-3 w-3" fill="none" height="16" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                        viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                                        <line x1="6" x2="6" y1="3" y2="15"></line>
                                        <circle cx="18" cy="6" r="3"></circle>
                                        <circle cx="6" cy="18" r="3"></circle>
                                        <path d="M18 9a9 9 0 0 1-9 9"></path>
                                    </svg>
                                    5
                                </span>
                            </div>
                            <span
                                class="rounded bg-zinc-200 px-1.5 py-0.5 text-xs text-zinc-700 dark:bg-zinc-700 dark:text-zinc-300">Node</span>
                        </div>
                    </a>

                    <!-- Repository 4 -->
                    <a class="flex aspect-square flex-col justify-between bg-zinc-100 p-4 transition-colors hover:bg-zinc-200 dark:bg-zinc-800 dark:hover:bg-zinc-700"
                        href="#">
                        <div>
                            <h3 class="text-sm font-medium text-zinc-900 dark:text-zinc-100">ui-components</h3>
                            <p class="mt-1 line-clamp-3 text-xs text-zinc-600 dark:text-zinc-400">A library of reusable
                                UI components built with React and Tailwind.</p>
                        </div>
                        <div class="mt-2 flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <span class="text-xs text-zinc-500 dark:text-zinc-500">
                                    <svg class="inline h-3 w-3" fill="none" height="16" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                        viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    56
                                </span>
                                <span class="text-xs text-zinc-500 dark:text-zinc-500">
                                    <svg class="inline h-3 w-3" fill="none" height="16" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                        viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                                        <line x1="6" x2="6" y1="3" y2="15"></line>
                                        <circle cx="18" cy="6" r="3"></circle>
                                        <circle cx="6" cy="18" r="3"></circle>
                                        <path d="M18 9a9 9 0 0 1-9 9"></path>
                                    </svg>
                                    22
                                </span>
                            </div>
                            <span
                                class="rounded bg-zinc-200 px-1.5 py-0.5 text-xs text-zinc-700 dark:bg-zinc-700 dark:text-zinc-300">TS</span>
                        </div>
                    </a>

                    <!-- Repository 5 -->
                    <a class="flex aspect-square flex-col justify-between bg-zinc-100 p-4 transition-colors hover:bg-zinc-200 dark:bg-zinc-800 dark:hover:bg-zinc-700"
                        href="#">
                        <div>
                            <h3 class="text-sm font-medium text-zinc-900 dark:text-zinc-100">data-viz</h3>
                            <p class="mt-1 line-clamp-3 text-xs text-zinc-600 dark:text-zinc-400">Data visualization
                                tools and components for web applications.</p>
                        </div>
                        <div class="mt-2 flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <span class="text-xs text-zinc-500 dark:text-zinc-500">
                                    <svg class="inline h-3 w-3" fill="none" height="16" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                        viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    32
                                </span>
                                <span class="text-xs text-zinc-500 dark:text-zinc-500">
                                    <svg class="inline h-3 w-3" fill="none" height="16" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                        viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                                        <line x1="6" x2="6" y1="3" y2="15"></line>
                                        <circle cx="18" cy="6" r="3"></circle>
                                        <circle cx="6" cy="18" r="3"></circle>
                                        <path d="M18 9a9 9 0 0 1-9 9"></path>
                                    </svg>
                                    14
                                </span>
                            </div>
                            <span
                                class="rounded bg-zinc-200 px-1.5 py-0.5 text-xs text-zinc-700 dark:bg-zinc-700 dark:text-zinc-300">JS</span>
                        </div>
                    </a>

                    <!-- Repository 6 -->
                    <a class="flex aspect-square flex-col justify-between bg-zinc-100 p-4 transition-colors hover:bg-zinc-200 dark:bg-zinc-800 dark:hover:bg-zinc-700"
                        href="#">
                        <div>
                            <h3 class="text-sm font-medium text-zinc-900 dark:text-zinc-100">cli-tools</h3>
                            <p class="mt-1 line-clamp-3 text-xs text-zinc-600 dark:text-zinc-400">Command-line tools
                                for developer productivity and automation.</p>
                        </div>
                        <div class="mt-2 flex items-center justify-between">
                            <div class="flex items-center space-x-2">
                                <span class="text-xs text-zinc-500 dark:text-zinc-500">
                                    <svg class="inline h-3 w-3" fill="none" height="16" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                        viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                                        <polygon
                                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                        </polygon>
                                    </svg>
                                    15
                                </span>
                                <span class="text-xs text-zinc-500 dark:text-zinc-500">
                                    <svg class="inline h-3 w-3" fill="none" height="16" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" stroke="currentColor"
                                        viewBox="0 0 24 24" width="16" xmlns="http://www.w3.org/2000/svg">
                                        <line x1="6" x2="6" y1="3" y2="15"></line>
                                        <circle cx="18" cy="6" r="3"></circle>
                                        <circle cx="6" cy="18" r="3"></circle>
                                        <path d="M18 9a9 9 0 0 1-9 9"></path>
                                    </svg>
                                    7
                                </span>
                            </div>
                            <span
                                class="rounded bg-zinc-200 px-1.5 py-0.5 text-xs text-zinc-700 dark:bg-zinc-700 dark:text-zinc-300">TS</span>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Footer -->
            <footer class="mt-12 border-t border-zinc-200 py-6 dark:border-zinc-700">
                <div class="flex flex-col items-center justify-between gap-4 text-xs text-zinc-500 dark:text-zinc-400">
                    <p>© 2024 Developer Portfolio. All rights reserved.</p>
                    <div class="flex items-center gap-4">
                        <a class="hover:text-zinc-800 dark:hover:text-zinc-200" href="#">Terms</a>
                        <a class="hover:text-zinc-800 dark:hover:text-zinc-200" href="#">Privacy</a>
                        <a class="hover:text-zinc-800 dark:hover:text-zinc-200" href="#">Contact</a>
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
        </script>
    </body>

</html>
