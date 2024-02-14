@props(['navigation' => null])

<nav class="flex flex-wrap items-center">
    @foreach ($navigation as $index => $key )
    @if($key['is_active'])
    <x-ui.nav-link :text="$key['name']" :href="$key['url']" :target="$key['target']" />
    @endif
    @endforeach
</nav>
