@props(['featuredPost', 'posts'])

@if($module_blog ?? false)
<x-core.layout>
    <div class="min-h-screen">
        <x-blog.partials.header :$posts />
        <div class="mx-auto py-12">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-20">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-12">
                    <x-blog.partials.main-content :$posts :$featured_post />
                </div>
                <x-blog.partials.sidebar />
            </div>
        </div>
    </div>
</x-core.layout>
@endif
