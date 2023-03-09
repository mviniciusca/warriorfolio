  @props([
    'title' => '',
    'cover' => '',
    'link' => ''
  ])
  <div class="bg-zinc-900 p-8 border border-zinc-800 opacity-50 grayscale hover:opacity-90 transition-all ease-in-out duration-200">
        <x-curator-glider :media="$cover" class="filter" />
  </div>
