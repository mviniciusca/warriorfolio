@props(['data' => null])

@if ($data->blog['is_active'] ?? false)
    <section id="blog-header-components"
        class="p-21 w-full rounded-xl bg-secondary-200/20 p-5 py-12 dark:bg-secondary-950/15">
        <div class="flex flex-initial items-center gap-2">
            <div class="h-32 w-32 rounded-lg bg-secondary-200/50 p-2 shadow-lg dark:bg-secondary-800">
                <img class="invert dark:invert-0" src="{{ asset('img/core/profile-picture.png') }}" alt="">
            </div>
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
