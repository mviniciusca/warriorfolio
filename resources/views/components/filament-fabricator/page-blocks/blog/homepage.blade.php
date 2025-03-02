@aware(['page'])
@props(['profile' => null])

<x-core.layout>
    <div class="mx-auto">
        <div class="-mx-4 flex flex-wrap">
            <div class="order-2 w-full pr-12 lg:order-1 lg:w-3/4">
                <x-blog.homepage />
            </div>
            <div class="order-1 hidden w-full lg:order-2 lg:block lg:w-1/4 lg:pl-8">
                <aside class="">
                    <x-blog.widget.profile />
                    <x-blog.widget.counter />
                </aside>
            </div>
        </div>
</x-core.layout>
