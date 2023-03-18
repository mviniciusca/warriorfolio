@foreach ($links as $link )
<li class="hover:text-orange-500 transition-all lowercase duration-150 lg:border-b lg:border-transparent lg:hover:border-b-orange-500 lg:pb-2">
    <a href="{{ $link->url }}" @click="show = !show">{{ $link->title }}</a>
</li>
@endforeach
