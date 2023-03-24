@props(['tag' => '', 'link' => '', 'bgColor' => 'bg-gray-500'])

{{--  Switch background colors --}}

@switch($tag)
    @case('laravel')
        @php
            $bgColor = 'bg-red-500';
        @endphp
        @break
    @case('github')
        @php
            $bgColor = 'bg-gray-500';
        @endphp
        @break
    @case('vercel')
        @php
            $bgColor = 'bg-orange-500';
        @endphp
        @break
    @case('dribbble')
        @php
            $bgColor = 'bg-pink-500';
        @endphp
        @break
    @case('web')
        @php
            $bgColor = 'bg-green-500';
        @endphp
        @break

    @default
        @php
            $bgColor = 'bg-zinc-900';
        @endphp

@endswitch

{{-- Load the Project --}}

@if($link !== '')
<a href="{{ $link }}">
@endif
    <div class="mb-2 flex items-center gap-1 p-1 rounded-md {{ $bgColor }}">
            @if($tag !== 'web')
                <ion-icon class="lowercase" name="logo-{{ $tag }}"></ion-icon>
            @else
                <ion-icon class="lowercase" name="logo-edge"></ion-icon>
            @endif
        @if($tag !== '')
            <span class="lowercase">{{ $tag }}</span>
        @endif
    </div>
@if($link !== '')
</a>
@endif
