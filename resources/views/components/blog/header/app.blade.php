@props(['data' => null])

@if ($data->blog['is_active'] ?? false)
<section id="blog-header-components" class="w-full overflow-hidden rounded-xl">
    <div class="flex flex-initial items-center gap-2">
        @if ($data->blog['is_logo_active'] ?? true)
        <div
            class="hidden h-16 w-16 overflow-hidden rounded-lg object-cover object-center p-2 sm:block sm:h-24 sm:w-24">
            @if ($data->blog['logo'] ?? false)
            <x-curator-glider
                class="h-20 w-20 rounded-md object-cover object-center {{ ($data->blog['is_invert_logo'] ?? false) ? 'invert-0 dark:invert' : ''}}"
                style="aspect-ratio: 1/1; object-fit: cover;" :media="$data->blog['logo']" />
            @else
            <img class="dark:invert invert-0 rounded-lg" src="{{ asset('img/core/profile-picture.png') }}"
                alt="warriorfolio-logo">
            @endif
        </div>
        @endif
        <div id="blog-name-group">
            @isset($data->blog['name'])
            <p class="text-2xl font-medium leading-none">
                {!! $data->blog['name'] !!}
            </p>
            @endisset
            @isset($data->blog['description'])
            <p class="py-1 text-sm opacity-80">
                {!! $data->blog['description'] !!}
            </p>
            @endisset
        </div>
    </div>
</section>
@endif
