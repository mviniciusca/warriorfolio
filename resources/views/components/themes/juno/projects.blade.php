@props(['data'])

<div class="mb-8">
    <h2 class="text-base font-medium text-secondary-900 dark:text-secondary-100">Portfolio
        Projects</h2>
    <p class="mt-1 text-xs text-secondary-600 dark:text-secondary-400">Showcasing my latest
        work and creative projects</p>
</div>
<div class="grid grid-cols-2 gap-1 md:grid-cols-3 md:gap-2">
    @foreach ($data as $item)
        <div
            class="group relative aspect-[4/3] overflow-hidden border border-secondary-200 dark:border-secondary-800/50">
            <a href="{{ config('app.url') . '/' . $item->slug }}">
                <img alt="E-commerce Platform"
                    class="h-full w-full object-cover transition-transform duration-300 group-hover:scale-110"
                    src="{{ asset('storage/' . $item->project->image_cover) }}">
                <div
                    class="absolute inset-0 bg-black bg-opacity-0 transition-all duration-300 group-hover:bg-opacity-70">
                    <div
                        class="absolute inset-0 flex flex-col justify-center p-4 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                        <h3 class="text-sm font-medium text-white">{{ $item->title }}</h3>
                        <p class="mt-1 text-xs text-gray-300">{{ ucfirst($item->project->category->name) }}</p>
                    </div>
            </a>

        </div>
</div>
</div>
@endforeach
</div>
