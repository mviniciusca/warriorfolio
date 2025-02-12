@aware(['page'])
@props(['profile' => null])
<x-core.layout>
    <div class="mx-auto">
        {{-- <x-blog.header.category /> --}}
        <div class="-mx-4 flex flex-wrap">
            <!-- Coluna principal -->
            <div class="order-2 w-full px-4 pr-8 lg:order-1 lg:w-2/3">
                <x-blog.homepage />
            </div>
            <!-- Coluna lateral -->
            <div class="order-1 hidden w-full lg:order-2 lg:block lg:w-1/3 lg:px-12">
                <aside>
                    <x-blog.widget.profile />
                </aside>
            </div>
        </div>
</x-core.layout>
