@aware(['page'])

@props([
    'title' => 'Project',
])
<x-core.layout :with_padding="true">
    @if ($page->project->is_active && $page->style == 'portfolio')
        <header class="mx-auto max-w-5xl">
            <div class="flex flex-col items-start justify-between gap-4 md:flex-row md:items-center">
                <div>
                    <h1 class="text-2xl font-bold tracking-tighter">{{ $page->title }}</h1>
                    <div class="mt-2 flex items-center">
                        <div class="h-8 w-8 overflow-hidden rounded-full">
                            <img alt="User avatar" class="h-full w-full object-cover"
                                src="{{ $page->user->profile->avatar ? asset('storage/' . $page->user->profile->avatar) : asset('img/core/profile-picture.png') }}">
                        </div>
                        <span class="ml-2 font-medium">{{ $page->user->name }}</span>
                    </div>
                </div>
                <x-blog.post.share />
            </div>
        </header>

        <!-- Main Content -->
        <main class="mx-auto mt-8 max-w-5xl px-4">
            <div class="mt-8">
                <div class="project-content text-sm" id="project-content">
                    {!! $page->project->content !!}
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="mx-auto mt-16 max-w-5xl px-4 pb-16">
            <!-- Profile section with line -->
            <div class="relative mb-8 flex justify-center">
                <div class="absolute left-0 right-0 top-1/2 h-px bg-black/10 dark:bg-white/10"></div>
                <div
                    class="relative z-10 h-20 w-20 overflow-hidden rounded-full border-4 border-white shadow-md dark:border-secondary-800 dark:bg-secondary-950">
                    <img alt="User avatar" class="h-full w-full object-cover"
                        src="{{ $page->user->profile->avatar ? asset('storage/' . $page->user->profile->avatar) : asset('img/core/profile-picture.png') }}">
                </div>
            </div>
            <!-- Bio -->
            <div class="mx-auto mb-12 max-w-2xl text-center">
                <h2 class="text-xl font-bold">{{ $page->user->name }}</h2>
                <p class="my-2 text-gray-600">
                    {!! $page->user->profile->job_position . ' • ' . $page->user->profile->localization ?? null !!}
                </p>
                <x-ui.social-network :justify="'center'" />
            </div>
        </footer>

        <!-- Gallery -->
        <h3 class="mb-4 text-xl font-bold">{{ __('More from ') . $page->user->name }}</h3>
        @livewire('portfolio.gallery')
    @else
        <x-blog.post.not-found />
    @endif
</x-core.layout>
