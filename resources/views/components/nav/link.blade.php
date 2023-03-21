{{-- Navbar Links: get the links from database --}}
@foreach ($links as $link)
    <li
        class="lowercase transition-all duration-150 hover:text-orange-500 lg:border-b lg:border-transparent lg:pb-2 lg:hover:border-b-orange-500">
        <a href="{{ $link->url }}"
            @click="show = !show">{{ $link->title }}</a>
    </li>
@endforeach
