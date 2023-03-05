  @props([
    'title' => '',
    'cover' => '',
    'link' => '',
    'tagColor' => 'red',
    'tagIconName' => '',
    'tagName' => '',
])
  <div>
      <div class="bg-zinc-900 p-4">

          <div class="absolute z-10 -ml-4 mt-8">

              <div
                  class="border-{{ $tagColor }}-400 mb-2 flex items-center gap-2 border-t-4 pt-1 pl-4 text-xl text-white">
                  <ion-icon name="logo-{{ $tagIconName }}"></ion-icon>
                  <span>{{ $tagName }}</span>
              </div>

          </div>

          <div class="bg-zinc-800">
              <img class="opacity-50 grayscale filter transition-all duration-200 ease-in-out hover:opacity-90 hover:filter-none"
                  src="http://localhost:8000/storage/fwzoX4R8iehNuVuYjlxUm9mOPGkCSd-metaSU1HXzIwMjIwODA2XzIyMzc1NC14ZC5qcGc=-.jpg">
          </div>
          <div>

          </div>
      </div>

  </div>
