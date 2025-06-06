@props(['featuredPost', 'posts'])

@if($module_blog ?? false)
<x-core.layout>
    <div class="min-h-screen">
        <!-- Header -->
        <header>
            <div class="mx-auto py-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Warriorfolio Notes</h1>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Laravel and Development</p>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="relative">
                            <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 h-4 w-4 text-gray-400"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            <input type="text" placeholder="Search articles..."
                                class="pl-10 w-64 px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white" />
                        </div>
                        <button
                            class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                            Write
                        </button>
                    </div>
                </div>
            </div>
        </header>

        <div class="max-w-7xl mx-auto py-12">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-12">
                    <!-- Featured Post -->
                    <x-blog.partials.featured :featuredPost="$featured_post" />

                    <!-- Posts List -->
                    <div class="space-y-8">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Latest Articles</h3>
                            <button
                                class="flex items-center text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors">
                                View all
                                <svg class="h-4 w-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7">
                                    </path>
                                </svg>
                            </button>
                        </div>

                        <div class="space-y-8">
                            @foreach($posts as $post)
                            <x-blog.partials.recent-posts :$post />
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-8">
                    <!-- Categories -->
                    <div class="space-y-4">
                        <h4 class="font-semibold text-gray-900 dark:text-white">Topics</h4>
                        <div class="flex flex-wrap gap-2">

                            <button class="h-8 px-3 py-1 text-sm rounded-md transition-colors ">
                                category
                            </button>

                        </div>
                    </div>

                    <!-- Trending -->
                    <div class="space-y-4">
                        <h4 class="font-semibold text-gray-900 dark:text-white">Trending</h4>
                        <div class="space-y-4">

                            <div class="flex gap-3 group cursor-pointer">
                                <span class="text-2xl font-bold text-gray-300 dark:text-gray-600 mt-1">

                                </span>
                                <div class="space-y-1">
                                    <h5
                                        class="font-medium leading-tight text-gray-900 dark:text-white group-hover:text-gray-600 dark:group-hover:text-gray-300 transition-colors">
                                        Lorem
                                    </h5>
                                    <div class="text-xs text-gray-600 dark:text-gray-400">
                                        <span>lorem</span>
                                        <span class="mx-1">•</span>
                                        <span>readtime</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Newsletter -->
                    <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-6 space-y-4">
                        <h4 class="font-semibold text-gray-900 dark:text-white">Stay Updated</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-400">Get the latest articles delivered to your
                            inbox.
                        </p>
                        <div class="space-y-3">
                            <input type="email" placeholder="Enter your email"
                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white" />
                            <button
                                class="w-full px-4 py-2 text-sm font-medium text-white bg-gray-900 dark:bg-white dark:text-gray-900 rounded-md hover:bg-gray-800 dark:hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors">
                                Subscribe
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-core.layout>
@endif
