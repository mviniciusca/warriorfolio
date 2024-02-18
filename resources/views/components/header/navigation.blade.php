@props(['navigation' => null])

<nav
    class="absolute z-50 min-w-36 max-w-sm items-center rounded-md border border-secondary-500 border-opacity-15 bg-white p-4 dark:border-opacity-20 dark:bg-secondary-800 lg:flex lg:w-auto lg:flex-wrap lg:rounded-none lg:border-none lg:bg-transparent lg:p-0 lg:shadow-none dark:lg:bg-transparent">
    @foreach ($navigation as $index => $key )
    @if($key['is_active'])
    <x-ui.nav-link :text="$key['name']" :href="$key['url']" :target="$key['target']" />
    @endif
    @endforeach
</nav>
