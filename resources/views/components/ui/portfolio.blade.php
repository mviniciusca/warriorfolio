@props(['title', 'tag', 'link', 'cover', 'tag', 'about'])

{{-- Portfolio Box --}}

<div class="p-3 hover:-translate-y-3  transition-all duration-300 py-8">

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
                <img class=" rounded-xl transition-all duration-200 ease-in-out hover:opacity-90 hover:filter-none "
                <x-curator-glider :media="$cover" class="rounded-xl"/>
            </div>
{{-- Project Title --}}
      </div>
{{-- End Portfolio Box --}}



