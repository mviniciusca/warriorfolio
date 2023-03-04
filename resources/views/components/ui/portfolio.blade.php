  @props([
    'title'         => '',
    'cover'         => '',
    'link'          => '',
    'tag_color'     => '',
    'tag_icon_name' => '',
    'tag_name'      => '',
  ])
  <div class="bg-zinc-900 p-4">

   <div class="-ml-4 absolute mt-8 z-10 ">

            <div class="text-xl text-white pt-1 border-t-4 pl-4 mb-2 border-{{$tag_color}}-400 flex items-center gap-2">
                <ion-icon name="logo-{{ $tag_icon_name }}"></ion-icon>
                <span>{{ $tag_name }}</span>
            </div>

    </div>

    <div class="bg-zinc-800">
    <img class="opacity-50 filter grayscale hover:filter-none hover:opacity-90 transition-all ease-in-out duration-200" src="http://localhost:8000/storage/fwzoX4R8iehNuVuYjlxUm9mOPGkCSd-metaSU1HXzIwMjIwODA2XzIyMzc1NC14ZC5qcGc=-.jpg">
    </div>
    <div>





    </div>
  </div>
