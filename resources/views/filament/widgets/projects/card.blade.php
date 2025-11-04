@php
$project = $getRecord();
@endphp

<div class="group relative transition-all duration-300 -my-4">
    {{-- Quick View Button with custom SVG --}}
    <a href="{{ config('app.url') }}/{{ $project->slug }}" target="_blank"
        class="absolute right-7 top-7 z-40 flex h-7 w-7 items-center justify-center rounded-lg bg-white opacity-0 transition-all duration-300 hover:bg-white group-hover:opacity-100 dark:bg-secondary-700 dark:hover:bg-secondary-700 hover:ring-2 hover:ring-secondary-500 dark:hover:ring-secondary-500">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" class="h-3.5 w-3.5 text-black">
            <path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z" />
            <circle cx="12" cy="12" r="3" />
        </svg>
    </a>

    {{-- Main link for project editing --}}
    <a href="{{ route('filament.admin.resources.projects.edit', ['record' => $project]) }}" class="block py-4 px-4">
        <div class="relative">
            {{-- Category Badge --}}
            <div class="absolute z-10 left-3 top-3 flex items-center gap-1 rounded-lg border px-2 py-0.5 text-[10px] font-medium bg-secondary-900 text-white bg-opacity-75 border-transparent"
                style="background-color: {{ $project->project->category->hex_color }}; border-color: {{ $project->project->category->hex_color }}">
                <span>
                    @if ($project->project->category->icon)
                    <x-ui.ionicon :icon="$project->project->category->icon" class="h-3 w-3" />
                    @else
                    <x-ui.ionicon icon="bookmark-sharp" class="h-3 w-3" />
                    @endif
                </span>
                {{ __(ucfirst($project->project->category->name)) }}
            </div>

            {{-- Main Image --}}
            <div class="aspect-[4/3] overflow-hidden rounded-xl">
                <img class="h-full w-full object-cover transition-all duration-300 rounded-xl group-hover:scale-105"
                    src="{{ asset('storage/' . $project->project->image_cover) }}" alt="{{ $project->title }}">
            </div>

            {{-- Edit Icon Overlay (Centro do Card) --}}
            <div
                class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300 z-30">
                <div
                    class="h-12 w-12 rounded-full bg-white flex items-center justify-center dark:bg-secondary-700 hover:ring-2 hover:ring-secondary-500 dark:hover:ring-secondary-500 transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-black">
                        <path d="M17 3a2.85 2.83 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3Z" />
                    </svg>
                </div>
            </div>

            {{-- Hover Overlay with Gradient --}}
            <div
                class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent opacity-0 group-hover:opacity-100 rounded-xl transition-all duration-300">
                {{-- Project Info --}}
                <div class="absolute bottom-0 left-0 right-0 p-4">
                    <h3
                        class="text-sm font-medium text-white translate-y-2 group-hover:translate-y-0 transition-all duration-300">
                        {{ $project->title }}
                    </h3>
                    @if($project->project->client)
                    <p
                        class="mt-1 text-xs text-white/80 translate-y-2 group-hover:translate-y-0 transition-all duration-300">
                        {{ $project->project->client }}
                    </p>
                    @endif
                </div>
            </div>
        </div>
    </a>
</div>
