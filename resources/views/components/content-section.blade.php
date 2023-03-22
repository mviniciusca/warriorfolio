@props([
    'title' => '',
    'nav_id' => '#',
    'subTitle' => '',
    'fatherClass' => '',
    'childrenClass' => '',
])
<div class="{{ $fatherClass }} mx-auto max-w-7xl">
    <div class="{{ $childrenClass }} p-8" id="{{ $nav_id }}">
        @if ($title !== '')
            <div class="flex justify-center pt-8 pb-12 text-center text-2xl font-bold lowercase tracking-tighter text-zinc-500 lg:pt-24 lg:pb-32 lg:text-4xl"
                id="title">{!! $title !!}
            </div>
        @endif
        @if ($subTitle !== '')
            <div class="text-md -mt-8 pb-8 text-center lowercase leading-loose text-zinc-400 lg:-mt-20 lg:pb-24 lg:text-base"
                id="subTitle">{!! $subTitle !!}</div>
        @endif
        <div id="main-content">{{ $slot }}</div>
    </div>
</div>
