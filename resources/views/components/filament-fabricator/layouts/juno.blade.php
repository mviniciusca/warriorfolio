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
        class="flex min-h-screen flex-col border border-secondary-200 font-sans antialiased transition-colors duration-200 dark:border-zinc-800 dark:bg-zinc-950">
        <x-ui.background />
        <x-header.section />
        <div class="container mx-auto max-w-4xl flex-grow px-4 py-16">

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
                        class="tab-button active-tab flex items-center gap-2 px-4 py-4 pb-2 text-sm text-secondary-900 dark:text-secondary-100"
                        id="repositories-tab" onclick="switchTab('repositories')">
                        <x-ui.ionicon icon="code-outline" /> Repositories
                    </button>
                    <button
                        class="tab-button flex items-center gap-2 px-4 py-4 pb-2 text-sm text-secondary-500 transition-colors hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-secondary-100"
                        id="projects-tab" onclick="switchTab('projects')">
                        <x-ui.ionicon icon="images-outline" /> Projects
                    </button>
                    <button
                        class="tab-button flex items-center gap-2 px-4 py-4 pb-2 text-sm text-secondary-500 transition-colors hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-secondary-100"
                        id="notes-tab" onclick="switchTab('notes')">
                        <x-ui.ionicon icon="document-text-outline" /> Notes
                    </button>
                    <button
                        class="tab-button flex items-center gap-2 px-4 py-4 pb-2 text-sm text-secondary-500 transition-colors hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-secondary-100"
                        id="about-tab" onclick="switchTab('about')">
                        <x-ui.ionicon icon="person-outline" /> About Me
                    </button>
                    <button
                        class="tab-button flex items-center gap-2 px-4 py-4 pb-2 text-sm text-secondary-500 transition-colors hover:text-secondary-900 dark:text-secondary-400 dark:hover:text-secondary-100"
                        id="contact-tab" onclick="switchTab('contact')">
                        <x-ui.ionicon icon="mail-outline" /> Contact
                    </button>
                </div>

                <!-- Tabs Content -->
                <div class="tab-content">
                    <!-- Repositories Tab -->
                    <div class="tab-pane" id="repositories-content">
                        <div class="mb-8 flex items-center justify-between">
                            <div>
                                <h2 class="text-base font-medium text-secondary-900 dark:text-secondary-100">Open Source
                                    Projects</h2>
                                <p class="mt-1 text-xs text-secondary-600 dark:text-secondary-400">A collection of my
                                    public repositories and contributions</p>
                            </div>
                            <a class="inline-flex items-center gap-2 rounded-md border border-secondary-300 bg-white px-4 py-2 text-sm font-medium text-secondary-900 transition-colors hover:border-secondary-400 hover:bg-secondary-50 focus:outline-none focus:ring-2 focus:ring-secondary-500 focus:ring-offset-2 dark:border-secondary-800 dark:bg-secondary-950 dark:text-secondary-100 dark:hover:border-secondary-700 dark:hover:bg-secondary-900 dark:focus:ring-secondary-600 dark:focus:ring-offset-secondary-950"
                                href="https://github.com/YOUR_USERNAME">
                                <x-ui.ionicon class="h-5 w-5" icon="logo-github" />
                                Follow on GitHub
                            </a>
                        </div>
                        <div class="grid grid-cols-2 gap-1 md:grid-cols-3 md:gap-2">
                            <!-- Repository Grid Content -->
                            <!-- Repository 1 -->
                            <a class="flex aspect-[4/3] flex-col justify-between border border-secondary-200 p-4 transition-colors hover:border-secondary-300 dark:border-zinc-800/50 dark:bg-zinc-900/50 dark:hover:border-zinc-700"
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
                            <a class="flex aspect-[4/3] flex-col justify-between border border-secondary-200 p-4 transition-colors hover:border-secondary-300 dark:border-zinc-800/50 dark:bg-zinc-900/50 dark:hover:border-zinc-700"
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
                            <a class="flex aspect-[4/3] flex-col justify-between border border-secondary-200 p-4 transition-colors hover:border-secondary-300 dark:border-zinc-800/50 dark:bg-zinc-900/50 dark:hover:border-zinc-700"
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
                            <a class="flex aspect-[4/3] flex-col justify-between border border-secondary-200 p-4 transition-colors hover:border-secondary-300 dark:border-zinc-800/50 dark:bg-zinc-900/50 dark:hover:border-zinc-700"
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
                            <a class="flex aspect-[4/3] flex-col justify-between border border-secondary-200 p-4 transition-colors hover:border-secondary-300 dark:border-zinc-800/50 dark:bg-zinc-900/50 dark:hover:border-zinc-700"
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
                            <a class="flex aspect-[4/3] flex-col justify-between border border-secondary-200 p-4 transition-colors hover:border-secondary-300 dark:border-zinc-800/50 dark:bg-zinc-900/50 dark:hover:border-zinc-700"
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

                    <!-- Projects Tab -->
                    <div class="tab-pane hidden" id="projects-content">
                        <div class="mb-8">
                            <h2 class="text-base font-medium text-secondary-900 dark:text-secondary-100">Portfolio
                                Projects</h2>
                            <p class="mt-1 text-xs text-secondary-600 dark:text-secondary-400">Showcasing my latest
                                work and creative projects</p>
                        </div>
                        <div class="grid grid-cols-2 gap-1 md:grid-cols-3 md:gap-2">
                            <!-- Project 1 -->
                            <div
                                class="group relative aspect-[4/3] overflow-hidden border border-secondary-200 dark:border-zinc-800/50">
                                <img alt="E-commerce Platform"
                                    class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110"
                                    src="https://images.unsplash.com/photo-1551650975-87deedd944c3">
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-0 transition-all duration-300 group-hover:bg-opacity-70">
                                    <div
                                        class="absolute inset-0 flex flex-col justify-center p-4 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                                        <h3 class="text-sm font-medium text-white">Modern E-commerce Platform</h3>
                                        <p class="mt-1 text-xs text-gray-300">Web Development</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Project 2 -->
                            <div
                                class="group relative aspect-[4/3] overflow-hidden border border-secondary-200 dark:border-zinc-800/50">
                                <img alt="Mobile App"
                                    class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110"
                                    src="https://images.unsplash.com/photo-1556155092-490a1ba16284">
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-0 transition-all duration-300 group-hover:bg-opacity-70">
                                    <div
                                        class="absolute inset-0 flex flex-col justify-center p-4 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                                        <h3 class="text-sm font-medium text-white">Fitness Tracking App</h3>
                                        <p class="mt-1 text-xs text-gray-300">Mobile Development</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Project 3 -->
                            <div
                                class="group relative aspect-[4/3] overflow-hidden border border-secondary-200 dark:border-zinc-800/50">
                                <img alt="Analytics Dashboard"
                                    class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110"
                                    src="https://images.unsplash.com/photo-1460925895917-afdab827c52f">
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-0 transition-all duration-300 group-hover:bg-opacity-70">
                                    <div
                                        class="absolute inset-0 flex flex-col justify-center p-4 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                                        <h3 class="text-sm font-medium text-white">Analytics Dashboard</h3>
                                        <p class="mt-1 text-xs text-gray-300">Data Visualization</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Project 4 -->
                            <div
                                class="group relative aspect-[4/3] overflow-hidden border border-secondary-200 dark:border-zinc-800/50">
                                <img alt="Social Network"
                                    class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110"
                                    src="https://images.unsplash.com/photo-1522542550221-31fd19575a2d">
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-0 transition-all duration-300 group-hover:bg-opacity-70">
                                    <div
                                        class="absolute inset-0 flex flex-col justify-center p-4 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                                        <h3 class="text-sm font-medium text-white">Social Network Platform</h3>
                                        <p class="mt-1 text-xs text-gray-300">Full Stack Development</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Project 5 -->
                            <div
                                class="group relative aspect-[4/3] overflow-hidden border border-secondary-200 dark:border-zinc-800/50">
                                <img alt="AI Assistant"
                                    class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110"
                                    src="https://images.unsplash.com/photo-1611162616305-c69b3fa7fbe0">
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-0 transition-all duration-300 group-hover:bg-opacity-70">
                                    <div
                                        class="absolute inset-0 flex flex-col justify-center p-4 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                                        <h3 class="text-sm font-medium text-white">AI Virtual Assistant</h3>
                                        <p class="mt-1 text-xs text-gray-300">Machine Learning</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Project 6 -->
                            <div
                                class="group relative aspect-[4/3] overflow-hidden border border-secondary-200 dark:border-zinc-800/50">
                                <img alt="Code Editor"
                                    class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110"
                                    src="https://images.unsplash.com/photo-1517694712202-14dd9538aa97">
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-0 transition-all duration-300 group-hover:bg-opacity-70">
                                    <div
                                        class="absolute inset-0 flex flex-col justify-center p-4 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                                        <h3 class="text-sm font-medium text-white">Custom Code Editor</h3>
                                        <p class="mt-1 text-xs text-gray-300">Desktop Application</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Project 7 -->
                            <div
                                class="group relative aspect-[4/3] overflow-hidden border border-secondary-200 dark:border-zinc-800/50">
                                <img alt="IoT Dashboard"
                                    class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110"
                                    src="https://images.unsplash.com/photo-1526498460520-4c246339dccb">
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-0 transition-all duration-300 group-hover:bg-opacity-70">
                                    <div
                                        class="absolute inset-0 flex flex-col justify-center p-4 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                                        <h3 class="text-sm font-medium text-white">IoT Smart Home Dashboard</h3>
                                        <p class="mt-1 text-xs text-gray-300">IoT / Frontend Development</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Project 8 -->
                            <div
                                class="group relative aspect-[4/3] overflow-hidden border border-secondary-200 dark:border-zinc-800/50">
                                <img alt="Blockchain App"
                                    class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110"
                                    src="https://images.unsplash.com/photo-1607252650355-f7fd0460ccdb">
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-0 transition-all duration-300 group-hover:bg-opacity-70">
                                    <div
                                        class="absolute inset-0 flex flex-col justify-center p-4 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                                        <h3 class="text-sm font-medium text-white">Blockchain Trading Platform</h3>
                                        <p class="mt-1 text-xs text-gray-300">Web3 Development</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Project 9 -->
                            <div
                                class="group relative aspect-[4/3] overflow-hidden border border-secondary-200 dark:border-zinc-800/50">
                                <img alt="AR Experience"
                                    class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110"
                                    src="https://images.unsplash.com/photo-1573164713714-d95e436ab8d6">
                                <div
                                    class="absolute inset-0 bg-black bg-opacity-0 transition-all duration-300 group-hover:bg-opacity-70">
                                    <div
                                        class="absolute inset-0 flex flex-col justify-center p-4 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                                        <h3 class="text-sm font-medium text-white">AR Shopping Experience</h3>
                                        <p class="mt-1 text-xs text-gray-300">Augmented Reality</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Notes Tab -->
                    <div class="tab-pane hidden" id="notes-content">
                        <div class="mb-8 flex items-center justify-between">
                            <div>
                                <h2 class="text-base font-medium text-secondary-900 dark:text-secondary-100">Latest
                                    Articles</h2>
                                <p class="mt-1 text-xs text-secondary-600 dark:text-secondary-400">Thoughts and
                                    tutorials on development, design, and technology</p>
                            </div>
                            <a class="inline-flex items-center gap-2 rounded-md border border-secondary-300 bg-white px-4 py-2 text-sm font-medium text-secondary-900 transition-colors hover:border-secondary-400 hover:bg-secondary-50 focus:outline-none focus:ring-2 focus:ring-secondary-500 focus:ring-offset-2 dark:border-secondary-800 dark:bg-secondary-950 dark:text-secondary-100 dark:hover:border-secondary-700 dark:hover:bg-secondary-900 dark:focus:ring-secondary-600 dark:focus:ring-offset-secondary-950"
                                href="/blog">
                                <x-ui.ionicon class="h-5 w-5" icon="newspaper-outline" />
                                View All Articles
                            </a>
                        </div>
                        <div class="grid gap-4">
                            <article
                                class="overflow-hidden rounded-md border border-secondary-200 transition-all hover:border-secondary-300 dark:border-zinc-800/50 dark:bg-zinc-900/50">
                                <div class="flex flex-col md:flex-row">
                                    <div class="relative h-40 w-full md:w-56">
                                        <img alt="Code on screen" class="h-full w-full object-cover"
                                            src="https://images.unsplash.com/photo-1461749280684-dccba630e2f6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=300&q=80">
                                    </div>
                                    <div class="flex flex-1 flex-col justify-between p-4">
                                        <div class="flex-1">
                                            <div class="flex items-center justify-between">
                                                <span class="text-xs text-secondary-500 dark:text-secondary-400">April
                                                    24, 2025</span>
                                                <span
                                                    class="inline-flex items-center rounded-full border border-secondary-200 px-2 py-0.5 text-xs dark:border-secondary-800">
                                                    Development
                                                </span>
                                            </div>
                                            <div class="mt-2">
                                                <h3
                                                    class="text-base font-medium text-secondary-900 dark:text-secondary-100">
                                                    Building Modern Web Applications with React and TypeScript
                                                </h3>
                                                <p
                                                    class="mt-1 line-clamp-2 text-xs text-secondary-600 dark:text-secondary-400">
                                                    Explore the powerful combination of React and TypeScript for
                                                    building robust web applications. Learn best practices, common
                                                    patterns, and advanced techniques.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <a class="inline-flex items-center text-xs font-medium text-secondary-900 hover:text-secondary-700 dark:text-secondary-100 dark:hover:text-secondary-300"
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
                                </div>
                            </article>

                            <article
                                class="overflow-hidden rounded-md border border-secondary-200 transition-all hover:border-secondary-300 dark:border-zinc-800/50 dark:bg-zinc-900/50">
                                <div class="flex flex-col md:flex-row">
                                    <div class="relative h-40 w-full md:w-56">
                                        <img alt="Server rack" class="h-full w-full object-cover"
                                            src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=300&q=80">
                                    </div>
                                    <div class="flex flex-1 flex-col justify-between p-4">
                                        <div class="flex-1">
                                            <div class="flex items-center justify-between">
                                                <span class="text-xs text-secondary-500 dark:text-secondary-400">April
                                                    20, 2025</span>
                                                <span
                                                    class="inline-flex items-center rounded-full border border-secondary-200 px-2 py-0.5 text-xs dark:border-secondary-800">
                                                    DevOps
                                                </span>
                                            </div>
                                            <div class="mt-2">
                                                <h3
                                                    class="text-base font-medium text-secondary-900 dark:text-secondary-100">
                                                    Docker and Kubernetes: A Practical Guide
                                                </h3>
                                                <p
                                                    class="mt-1 line-clamp-2 text-xs text-secondary-600 dark:text-secondary-400">
                                                    Deep dive into containerization and orchestration. Learn how to
                                                    deploy, scale, and manage applications using Docker and Kubernetes.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <a class="inline-flex items-center text-xs font-medium text-secondary-900 hover:text-secondary-700 dark:text-secondary-100 dark:hover:text-secondary-300"
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
                                </div>
                            </article>

                            <article
                                class="overflow-hidden rounded-md border border-secondary-200 transition-all hover:border-secondary-300 dark:border-zinc-800/50 dark:bg-zinc-900/50">
                                <div class="flex flex-col md:flex-row">
                                    <div class="relative h-40 w-full md:w-56">
                                        <img alt="Matrix code" class="h-full w-full object-cover"
                                            src="https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=300&q=80">
                                    </div>
                                    <div class="flex flex-1 flex-col justify-between p-4">
                                        <div class="flex-1">
                                            <div class="flex items-center justify-between">
                                                <span class="text-xs text-secondary-500 dark:text-secondary-400">April
                                                    15, 2025</span>
                                                <span
                                                    class="inline-flex items-center rounded-full border border-secondary-200 px-2 py-0.5 text-xs dark:border-secondary-800">
                                                    Security
                                                </span>
                                            </div>
                                            <div class="mt-2">
                                                <h3
                                                    class="text-base font-medium text-secondary-900 dark:text-secondary-100">
                                                    Web Security Best Practices for Modern Applications
                                                </h3>
                                                <p
                                                    class="mt-1 line-clamp-2 text-xs text-secondary-600 dark:text-secondary-400">
                                                    Essential security practices for protecting web applications. From
                                                    XSS prevention to CSRF protection, learn how to keep your
                                                    applications secure.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <a class="inline-flex items-center text-xs font-medium text-secondary-900 hover:text-secondary-700 dark:text-secondary-100 dark:hover:text-secondary-300"
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
                                </div>
                            </article>
                        </div>
                    </div>

                    <!-- About Tab -->
                    <div class="tab-pane hidden" id="about-content">
                        <div class="mb-8">
                            <h2 class="text-base font-medium text-secondary-900 dark:text-secondary-100">About Me</h2>
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
                                        <p>🚀 Full Stack Explorer navigating the digital cosmos</p>

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

                                        <p>⚡ Transforming coffee into code since 2015</p>
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
                                                <p class="mt-1 text-xs text-secondary-600 dark:text-secondary-400">Vue
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
                            <h2 class="text-base font-medium text-secondary-900 dark:text-secondary-100">Get in Touch
                            </h2>
                            <p class="mt-1 text-xs text-secondary-600 dark:text-secondary-400">Have a project in mind?
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
                <div class="py-16">
                    <div class="mx-auto max-w-2xl text-center">
                        <h2 class="text-xl font-semibold text-secondary-900 dark:text-secondary-100">Subscribe to My
                            Newsletter</h2>
                        <p class="mt-2 text-sm text-secondary-600 dark:text-secondary-400">Get the latest updates,
                            articles, and resources delivered straight to your inbox.</p>

                        <form class="mt-6">
                            <div class="flex flex-col items-center gap-3 sm:flex-row sm:justify-center">
                                <input
                                    class="w-full rounded-md border border-secondary-300 bg-white px-4 py-2.5 text-sm text-secondary-900 transition-colors placeholder:text-secondary-500 hover:border-secondary-400 focus:border-secondary-500 focus:outline-none focus:ring-1 focus:ring-secondary-500 dark:border-secondary-800 dark:bg-secondary-950 dark:text-secondary-100 dark:placeholder:text-secondary-600 dark:hover:border-secondary-700 dark:focus:border-secondary-600 dark:focus:ring-secondary-600 sm:w-72"
                                    placeholder="Enter your email" required type="email">
                                <button
                                    class="w-full rounded-md border border-secondary-900 bg-secondary-900 px-4 py-2.5 text-sm font-medium text-white transition-colors hover:bg-secondary-800 focus:outline-none focus:ring-2 focus:ring-secondary-900 focus:ring-offset-2 dark:border-secondary-100 dark:bg-secondary-100 dark:text-secondary-900 dark:hover:bg-secondary-200 dark:focus:ring-secondary-100 dark:focus:ring-offset-secondary-950 sm:w-auto"
                                    type="submit">
                                    Subscribe
                                </button>
                            </div>
                            <p class="mt-3 text-xs text-secondary-500 dark:text-secondary-400">
                                By subscribing, you agree to our Privacy Policy. No spam, unsubscribe anytime.
                            </p>
                        </form>
                    </div>
                </div>
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
