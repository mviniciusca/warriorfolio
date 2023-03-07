@props([
   'title'  => '',
   'cover'  => '',
   'link'   => '',
   'tag'    => '',
   'about'  => ''
])

{{-- Portfolio Box --}}

<div class="bg-gradient-to-t from-zinc-900 to-black p-4 rounded-xl
hover:-translate-y-3  transition-all duration-300"
>

{{--  Portfolio Tags --}}
          <div class="absolute z-10 -ml-4 mt-8 text-sm font-semibold text-white">

        {{-- laravel app tag --}}

           @if($tag == 'dribbble')
            @if($link != '')
                <a href="{{ $link }}">
                @endif
                <div class="mb-2 flex items-center gap-1 bg-pink-500  p-1">
                    <ion-icon name="logo-dribbble"></ion-icon>
                    <span>dribbble</span>
                </div>
                @if($link != '')
                </a>
                @endif
            @endif

        {{-- laravel app tag --}}

           @if($tag == 'laravel')
            @if($link != '')
                <a href="{{ $link }}">
                @endif
                <div class="mb-2 flex items-center gap-1 bg-red-500  p-1">
                    <ion-icon name="logo-laravel"></ion-icon>
                    <span>laravel</span>
                </div>
                @if($link != '')
                </a>
                @endif
            @endif

        {{-- vercel app tag --}}

           @if($tag == 'vercel')
            @if($link != '')
                <a href="{{ $link }}">
                @endif
                <div class="mb-2 flex items-center gap-1 bg-orange-500 p-1">
                    <ion-icon name="logo-vercel"></ion-icon>
                    <span>vercel</span>
                </div>
                @if($link != '')
                </a>
                @endif
            @endif

        {{-- github app tag --}}

           @if($tag == 'github')
            @if($link != '')
                <a href="{{ $link }}">
                @endif
                <div class="mb-2 flex items-center gap-1 bg-indigo-500 p-1">
                    <ion-icon name="logo-github"></ion-icon>
                    <span>github</span>
                </div>
                @if($link != '')
                </a>
                @endif
            @endif

        {{-- github app tag --}}

           @if($tag == 'web')
            @if($link != '')
                <a href="{{ $link }}">
                @endif
                <div class="mb-2 flex items-center gap-1 bg-green-500 p-1">
                    <ion-icon name="logo-edge"></ion-icon>
                    <span>web</span>
                </div>
                @if($link != '')
                </a>
                @endif
            @endif

          </div>
{{--  End Portfolio Tags }}
{{-- Project Cover --}}
            <div id="project-cover">
                <img class="opacity-30 grayscale filter transition-all duration-200 ease-in-out hover:opacity-90 hover:filter-none rounded-xl"
                <x-curator-glider :media="$cover"/>
            </div>
{{-- Project Title --}}
            <div class="text-zinc-400 lowercase pt-4 pb-2 font-extrabold">
                {{ $title }}
            </div>
      </div>
{{-- End Portfolio Box --}}



