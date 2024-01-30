@props(['navigation' => null])
<nav class="flex flex-wrap items-center">
    @foreach ($navigation as $index => $key )
    <x-ui.nav-link :text="$key['name']" :href="$key['url']" :target="$key['target']" />
    @endforeach
</nav>
