@props([
   'title' => '',
   'cover' => '',
])

{{-- Portfolio Box --}}
<div class=" bg-gradient-to-tr from-zinc-900 to-black p-4">

{{--  Portfolio Tags --}}
          <div class="absolute z-10 -ml-4 mt-8 text-sm font-semibold text-white">

            {{-- laravel app tag --}}
              <div class="mb-2 flex items-center gap-1 bg-red-500  p-1">
                  <ion-icon name="logo-laravel"></ion-icon>
                  <span>laravel</span>
              </div>

            {{-- vercel app tag --}}
              <div class="mb-2 flex items-center gap-1 bg-orange-500  p-1">
                  <ion-icon name="logo-vercel"></ion-icon>
                  <span>vercel</span>
              </div>

            {{-- github app tag --}}
              <div class="mb-2 flex items-center gap-1 bg-indigo-500 p-1">
                  <ion-icon name="logo-github"></ion-icon>
                  <span>github</span>
              </div>

          </div>
{{--  End Portfolio Tags --}}

{{-- Project Cover --}}
            <div class="bg-zinc-800">
                <img class="opacity-50 grayscale filter transition-all duration-200 ease-in-out hover:opacity-90 hover:filter-none"
                src="{{ asset('storage/media/' . $cover) }}" />
            </div>
{{-- Project Title --}}
            <div class="text-zinc-500 lowercase pt-4 pb-4 font-semibold">
                {{ $title }}
            </div>
      </div>
{{-- End Portfolio Box --}}



