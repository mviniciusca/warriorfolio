@props([
    'title'         => '',
    'class'         => '',
    'fatherClass'   => 'grid',
    'childrenClass' => '',
    'subTitle'      => '',
])

<div>

    <div class="max-w-7xl mx-auto items-center justify-center {{ $fatherClass }}">
    <div class="px-4 py-4 {{ $childrenClass }}">

            @if($title !== '')
                <div class="text-5xl justify-center flex font-bold text-zinc-500 lowercase tracking-tighter pt-24 pb-32" id="title">{{ $title }}</div>
            @endif

            @if ($subTitle !== '')
                <div class="pb-24 -mt-20 text-center text-zinc-400 leading-loose" id="subTitle">{{ $subTitle }}</div>
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
