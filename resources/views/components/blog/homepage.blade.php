<x-core.layout>
    <main class="mx-auto max-w-3xl">
        @foreach ($data as $item)
            @if ($item->is_active)
                <a class="transition-all duration-100 hover:underline hover:opacity-90"
                    href="{{ env('APP_URL') . '/' . $item->slug }}">
                    <div
                        class="flex w-full overflow-hidden border-b border-b-secondary-200 py-8 dark:border-b-secondary-800">
                        <div class="w-2/3 p-4">
                            <div class="mb-2 text-xl font-bold">{{ $item->title }}</div>
                            <p class="text-base">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis labore pariatur
                                minus!
                            </p>
                        </div>
                        <div class="w-32">
                            <x-curator-glider class="rounded-lg object-cover" :media="$item->img_cover" />
                        </div>
                    </div>
                </a>
            @endif
        @endforeach
        <div class="py-8">
            {{ $data->links() }}
        </div>
    </main>
</x-core.layout>
