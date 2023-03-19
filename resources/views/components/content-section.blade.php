@props([
    'nav_id'        => '',
    'title'         => '',
    'subTitle'      => '',
    'fatherClass'   => '',
    'childrenClass' => '',
])

<div>

    <div class="max-w-7xl mx-auto {{ $fatherClass }}">
    <div class="px-4 py-4 {{ $childrenClass }}" id="{{ $nav_id }}">

            @if($title !== '')
                <div class="text-2xl lg:text-4xl justify-center text-center flex font-bold text-zinc-500 lowercase tracking-tighter pt-8 pb-12 lg:pt-24 lg:pb-32" id="title">{!! $title !!}</div>
            @endif

            @if ($subTitle !== '')
                <div class="lg:pb-24 lowercase lg:-mt-20 pb-8 -mt-8 text-center text-zinc-400 leading-loose text-md lg:text-base" id="subTitle">{!! $subTitle !!}</div>
            @endif

            <div id="main-content">{{ $slot }}</div>

        </div>
    </div>

</div>













{{--  <div class="text-5xl font-bold text-zinc-500 lowercase tracking-tighter pb-16 pt-16 w-full flex gap-4 items-center justify-center">
<div class="">{{ $title }}</div>
</div>
<div class="px-4 py-4 md:py-8">
    <div class="max-w-7xl mx-auto {{ $class }}">
        {{ $slot }}
    </div>
<div>  --}}
