@props(['data' => null])

@if ($data->blog['is_active'] ?? false)
    <section id="blog-header-components" class="w-full py-12">
        <div class="flex flex-initial items-center gap-2">

            <div id="blog-name-group">
                @isset($data->blog['name'])
                    <p class="text-5xl font-semibold leading-none tracking-tighter">
                        {!! $data->blog['name'] !!}
                    </p>
                @endisset
                @isset($data->blog['description'])
                    <p class="py-2 text-base opacity-70">
                        {!! $data->blog['description'] !!}
                    </p>
                @endisset
            </div>
        </div>
    </section>
@endif
