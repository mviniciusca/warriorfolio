<x-core.layout class="">
    <x-slot name="module_title">
        From Notes
    </x-slot>
    <x-slot name="module_subtitle">
        Latest posts from our Blog.
    </x-slot>
    <section class="mt-8">
        <div class="grid gap-8 lg:grid-cols-2">
            @foreach ($posts as $item)
                <x-blog.post.card-block :$item />
            @endforeach
        </div>
        </div>
    </section>
</x-core.layout>
