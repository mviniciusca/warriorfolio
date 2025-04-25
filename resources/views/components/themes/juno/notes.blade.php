@props([])

<div class="mb-8 flex items-center justify-between">
    <div>
        <h2 class="text-base font-medium text-secondary-900 dark:text-secondary-100">Latest Articles</h2>
        <p class="cdark:text-secondary-400 mt-1 text-xs text-secondary-600">Thoughts and tutorials on development,
            design, and technology</p>
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
            <h3 class="mt-2 text-sm font-medium text-secondary-900 dark:text-secondary-100">Building Modern Web
                Applications with React and TypeScript</h3>
            <p class="mt-2 line-clamp-2 text-xs text-secondary-600 dark:text-secondary-400">Explore the powerful
                combination of React and TypeScript for building robust web applications.</p>
            <a class="mt-3 inline-flex items-center text-xs font-medium text-secondary-900 hover:text-secondary-700 dark:text-secondary-100 dark:hover:text-secondary-300"
                href="#">
                Read more
                <svg class="ml-1 h-3 w-3" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    stroke="currentColor" viewBox="0 0 24 24">
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
            <h3 class="mt-2 text-sm font-medium text-secondary-900 dark:text-secondary-100">Docker and Kubernetes: A
                Practical Guide</h3>
            <p class="mt-2 line-clamp-2 text-xs text-secondary-600 dark:text-secondary-400">Deep dive into
                containerization and orchestration. Learn how to deploy, scale, and manage applications using Docker and
                Kubernetes.</p>
            <a class="mt-3 inline-flex items-center text-xs font-medium text-secondary-900 hover:text-secondary-700 dark:text-secondary-100 dark:hover:text-secondary-300"
                href="#">
                Read more
                <svg class="ml-1 h-3 w-3" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    stroke="currentColor" viewBox="0 0 24 24">
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
            <h3 class="mt-2 text-sm font-medium text-secondary-900 dark:text-secondary-100">Web Security Best Practices
                for Modern Applications</h3>
            <p class="mt-2 line-clamp-2 text-xs text-secondary-600 dark:text-secondary-400">Essential security practices
                for protecting web applications. From XSS prevention to CSRF protection, learn how to keep your
                applications secure.</p>
            <a class="mt-3 inline-flex items-center text-xs font-medium text-secondary-900 hover:text-secondary-700 dark:text-secondary-100 dark:hover:text-secondary-300"
                href="#">
                Read more
                <svg class="ml-1 h-3 w-3" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </a>
        </div>
    </article>
</div>
