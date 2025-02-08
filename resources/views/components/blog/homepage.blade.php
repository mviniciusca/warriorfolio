<x-core.layout>
    <main class="mx-auto max-w-3xl">
        @foreach ($data as $item)
            <div class="flex w-full overflow-hidden border-b border-b-secondary-200 py-8 dark:border-b-secondary-800">
                <div class="w-2/3 p-4">
                    <div class="mb-2 text-xl font-bold">Título do Card</div>
                    <p class="text-base">
                        Esta é uma pequena descrição do card. Ela pode conter mais detalhes sobre o conteúdo do card.
                    </p>
                </div>
                <div class="w-32">
                    <x-curator-glider class="rounded-lg object-cover" :media="$item->img_cover" />
                </div>
            </div>
        @endforeach
    </main>
</x-core.layout>
