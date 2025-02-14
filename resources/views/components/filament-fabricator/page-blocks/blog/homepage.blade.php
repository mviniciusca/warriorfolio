@aware(['page'])
@props(['profile' => null])
<x-core.layout>
    <div class="mx-auto">
        {{-- <x-blog.header.category /> --}}
        <div class="-mx-4 flex flex-wrap">
            <!-- Coluna principal -->
            <div class="order-2 w-full pr-12 lg:order-1 lg:w-3/4">
                <x-blog.homepage />
            </div>
            <!-- Coluna lateral -->
            <div class="order-1 hidden w-full lg:order-2 lg:block lg:w-1/4 lg:pl-8">
                <aside>
                    <x-blog.widget.profile />
                </aside>
            </div>
        </div>
</x-core.layout>
