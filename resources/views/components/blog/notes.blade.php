@if ($module_blog ?? false)
    <x-core.layout>
        <div class="min-h-screen">
            <x-blog.partials.header :$posts />
            <div class="mx-auto py-12">
                {{-- lg:items-start evita esticar a coluna da sidebar; sticky mantém a barra visível ao rolar o feed --}}
                <div class="grid grid-cols-1 items-start gap-12 lg:grid-cols-3 lg:gap-16 xl:gap-20">
                    <div class="lg:col-span-2 space-y-12">
                        <x-blog.partials.main-content :$posts :$featured_posts :$active_category />
                    </div>
                    <aside class="lg:sticky lg:top-24 xl:top-28">
                        <x-blog.partials.sidebar />
                    </aside>
                </div>
            </div>
        </div>
    </x-core.layout>
@endif
