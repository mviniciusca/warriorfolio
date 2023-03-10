  @props([
    'title' => '',
    'cover' => '',
    'link'  => ''
  ])

@if ($link !== '')
<a href="{{ $link }}">
@endif
  <div class=" bg-gradient-to-bl from-black to-zinc-900 p-8 opacity-50 grayscale hover:opacity-90 transition-all ease-in-out duration-200">
        <x-curator-glider :media="$cover" />
  </div>
@if ($link !== '')
</a>
@endif

