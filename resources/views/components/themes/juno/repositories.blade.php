@props(['githubUser' => null])
@dd($repositories)

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
        <a class="flex aspect-[4/3] flex-col justify-between border border-secondary-200 p-4 transition-colors hover:border-secondary-300 dark:border-secondary-800/50 dark:bg-secondary-900/50 dark:hover:border-secondary-700"
            href="#">
            <div>
                <h3 class="text-sm font-medium dark:text-secondary-100">project-name</h3>
                <p class="mt-1 line-clamp-3 text-xs dark:text-secondary-400">A brief description
                    of the project and what it does.</p>
            </div>
            <div class="mt-2 flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <span class="text-xs dark:text-secondary-500">
                        <svg class="inline h-3 w-3" fill="none" height="16" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"
                            width="16" xmlns="http://www.w3.org/2000/svg">
                            <polygon
                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                            </polygon>
                        </svg>
                        24
                    </span>
                    <span class="text-xs dark:text-secondary-500">
                        <svg class="inline h-3 w-3" fill="none" height="16" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"
                            width="16" xmlns="http://www.w3.org/2000/svg">
                            <line x1="6" x2="6" y1="3" y2="15">
                            </line>
                            <circle cx="18" cy="6" r="3"></circle>
                            <circle cx="6" cy="18" r="3"></circle>
                            <path d="M18 9a9 9 0 0 1-9 9"></path>
                        </svg>
                        8
                    </span>
                </div>
                <span class="rounded bg-secondary-200 px-1.5 py-0.5 text-xs dark:bg-secondary-700">JS</span>
            </div>
        </a>

        <!-- Repository 2 -->
        <a class="flex aspect-[4/3] flex-col justify-between border border-secondary-200 p-4 transition-colors hover:border-secondary-300 dark:border-secondary-800/50 dark:bg-secondary-900/50 dark:hover:border-secondary-700"
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
                        <svg class="inline h-3 w-3" fill="none" height="16" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"
                            width="16" xmlns="http://www.w3.org/2000/svg">
                            <polygon
                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                            </polygon>
                        </svg>
                        42
                    </span>
                    <span class="text-xs dark:text-secondary-500">
                        <svg class="inline h-3 w-3" fill="none" height="16" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"
                            width="16" xmlns="http://www.w3.org/2000/svg">
                            <line x1="6" x2="6" y1="3" y2="15">
                            </line>
                            <circle cx="18" cy="6" r="3"></circle>
                            <circle cx="6" cy="18" r="3"></circle>
                            <path d="M18 9a9 9 0 0 1-9 9"></path>
                        </svg>
                        12
                    </span>
                </div>
                <span class="rounded bg-secondary-200 px-1.5 py-0.5 text-xs dark:bg-secondary-700">React</span>
            </div>
        </a>

        <!-- Repository 3 -->
        <a class="flex aspect-[4/3] flex-col justify-between border border-secondary-200 p-4 transition-colors hover:border-secondary-300 dark:border-secondary-800/50 dark:bg-secondary-900/50 dark:hover:border-secondary-700"
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
                        <svg class="inline h-3 w-3" fill="none" height="16" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"
                            width="16" xmlns="http://www.w3.org/2000/svg">
                            <polygon
                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                            </polygon>
                        </svg>
                        18
                    </span>
                    <span class="text-xs dark:text-secondary-500">
                        <svg class="inline h-3 w-3" fill="none" height="16" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"
                            width="16" xmlns="http://www.w3.org/2000/svg">
                            <line x1="6" x2="6" y1="3" y2="15">
                            </line>
                            <circle cx="18" cy="6" r="3"></circle>
                            <circle cx="6" cy="18" r="3"></circle>
                            <path d="M18 9a9 9 0 0 1-9 9"></path>
                        </svg>
                        5
                    </span>
                </div>
                <span class="rounded bg-secondary-200 px-1.5 py-0.5 text-xs dark:bg-secondary-700">Node</span>
            </div>
        </a>

        <!-- Repository 4 -->
        <a class="flex aspect-[4/3] flex-col justify-between border border-secondary-200 p-4 transition-colors hover:border-secondary-300 dark:border-secondary-800/50 dark:bg-secondary-900/50 dark:hover:border-secondary-700"
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
                        <svg class="inline h-3 w-3" fill="none" height="16" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"
                            width="16" xmlns="http://www.w3.org/2000/svg">
                            <polygon
                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                            </polygon>
                        </svg>
                        56
                    </span>
                    <span class="text-xs dark:text-secondary-500">
                        <svg class="inline h-3 w-3" fill="none" height="16" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"
                            width="16" xmlns="http://www.w3.org/2000/svg">
                            <line x1="6" x2="6" y1="3" y2="15">
                            </line>
                            <circle cx="18" cy="6" r="3"></circle>
                            <circle cx="6" cy="18" r="3"></circle>
                            <path d="M18 9a9 9 0 0 1-9 9"></path>
                        </svg>
                        22
                    </span>
                </div>
                <span class="rounded bg-secondary-200 px-1.5 py-0.5 text-xs dark:bg-secondary-700">TS</span>
            </div>
        </a>

        <!-- Repository 5 -->
        <a class="flex aspect-[4/3] flex-col justify-between border border-secondary-200 p-4 transition-colors hover:border-secondary-300 dark:border-secondary-800/50 dark:bg-secondary-900/50 dark:hover:border-secondary-700"
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
                        <svg class="inline h-3 w-3" fill="none" height="16" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"
                            width="16" xmlns="http://www.w3.org/2000/svg">
                            <polygon
                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                            </polygon>
                        </svg>
                        32
                    </span>
                    <span class="text-xs dark:text-secondary-500">
                        <svg class="inline h-3 w-3" fill="none" height="16" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"
                            width="16" xmlns="http://www.w3.org/2000/svg">
                            <line x1="6" x2="6" y1="3" y2="15">
                            </line>
                            <circle cx="18" cy="6" r="3"></circle>
                            <circle cx="6" cy="18" r="3"></circle>
                            <path d="M18 9a9 9 0 0 1-9 9"></path>
                        </svg>
                        14
                    </span>
                </div>
                <span class="rounded bg-secondary-200 px-1.5 py-0.5 text-xs dark:bg-secondary-700">JS</span>
            </div>
        </a>

        <!-- Repository 6 -->
        <a class="flex aspect-[4/3] flex-col justify-between border border-secondary-200 p-4 transition-colors hover:border-secondary-300 dark:border-secondary-800/50 dark:bg-secondary-900/50 dark:hover:border-secondary-700"
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
                        <svg class="inline h-3 w-3" fill="none" height="16" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"
                            width="16" xmlns="http://www.w3.org/2000/svg">
                            <polygon
                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                            </polygon>
                        </svg>
                        15
                    </span>
                    <span class="text-xs dark:text-secondary-500">
                        <svg class="inline h-3 w-3" fill="none" height="16" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"
                            width="16" xmlns="http://www.w3.org/2000/svg">
                            <line x1="6" x2="6" y1="3" y2="15">
                            </line>
                            <circle cx="18" cy="6" r="3"></circle>
                            <circle cx="6" cy="18" r="3"></circle>
                            <path d="M18 9a9 9 0 0 1-9 9"></path>
                        </svg>
                        7
                    </span>
                </div>
                <span class="rounded bg-secondary-200 px-1.5 py-0.5 text-xs dark:bg-secondary-700">TS</span>
            </div>
        </a>
    </div>
</div>
