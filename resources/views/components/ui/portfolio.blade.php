@props([
    "title" => "",
    "cover" => "",
    "link" => ""
])

  <div>
      <div class="bg-zinc-900 p-4">

          <div class="absolute z-10 -ml-4 mt-8 text-sm font-semibold text-white">

              <div class="mb-2 flex items-center gap-1 bg-red-400 p-1">
                  <ion-icon name="logo-laravel"></ion-icon>
                  <span>laravel</span>
              </div>

              <div class="mb-2 flex items-center gap-1 bg-orange-400 p-1">
                  <ion-icon name="logo-vercel"></ion-icon>
                  <span>vercel</span>
              </div>

              <div class="mb-2 flex items-center gap-1 bg-indigo-400 p-1">
                  <ion-icon name="logo-github"></ion-icon>
                  <span>github</span>
              </div>

          </div>

          <div class="bg-zinc-800">
            <img class="opacity-50 grayscale filter transition-all duration-200 ease-in-out hover:opacity-90 hover:filter-none"
            src="{{ asset('storage/media/' . $cover) }}" />
          </div>
          <div>
          </div>
      </div>

  </div>
