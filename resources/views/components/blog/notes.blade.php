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
                        {{-- --}}
                    </div>
                </div>
        </header>

        <div class="mx-auto py-12">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-20">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-12">
                    <!-- Featured Post -->
                    <x-blog.partials.featured :featuredPost="$featured_post" />

                    <!-- Posts List -->
                    <div class="space-y-8">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Latest Articles</h3>
                            <x-ui.button icon="arrow-forward-sharp" style="primary" :icon_before="false">
                                {{ __('View All') }}
                            </x-ui.button>
                        </div>

                        <div class="space-y-8">
                            <x-blog.partials.recent-posts :$posts />
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-12">

                    <x-themes.common.profile :centered="true" />

                    <div class="rounded-lg saturn-text border saturn-border-accent p-12 space-y-4">
                        <x-blog.widget.counter />
                    </div>
                    <!-- Newsletter -->
                    <div class="saturn-bg-accent rounded-lg saturn-text border saturn-border-accent p-12 space-y-4">
                        <h1 class="saturn-h5 saturn-text">{{ __('Join our Newsletter') }}</h1>
                        <p class="text-sm opacity-70">{!! __('Join our
                            newsletter and stay updated with the latest articles, tips, and resources for Laravel and
                            development.')
                            !!}</p>
                        @livewire('newsletter', ['is_section_filled_inverted' => true])
                        <p class="text-xs">{{ __('We hate spam!') }}</p>
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
</x-core.layout>
@endif
