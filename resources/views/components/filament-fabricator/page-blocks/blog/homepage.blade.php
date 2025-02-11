@props(['profile ' => null, 'page' => null])
<x-core.layout>
    <div class="mx-auto">
        <div class="-mx-4 flex flex-wrap">
            <!-- Coluna principal -->
            <div class="order-2 w-full px-4 lg:w-2/3">
                <x-blog.homepage />
            </div>
            <!-- Coluna lateral -->
            <div class="order-1 hidden w-full lg:block lg:w-1/3 lg:px-12">
                <aside>
                    <x-blog.widget.profile />
                </aside>
            </div>
        </div>
</x-core.layout>
