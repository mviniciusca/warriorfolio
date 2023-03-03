@props([
    'course'         => '10',
    'date'          => '',
    'university'    => '',
])
<div class="relative">
  <div class="h-full w-6 absolute inset-0 flex items-center justify-center">
    <div class="h-full w-1 bg-black pointer-events-none"></div>
  </div>
  <div class="bg-black text-zinc-900 h-4 w-4 rounded-full absolute top-4 -mt-8 left-1"></div>
  <div class="ml-10">
  <div class="-mt-5">
    <div class="text-xl font-semibold text-zinc-400">{{ $course }}</div>
    <div class="text-md  text-zinc-400">{{ $university }}</div>
    <div class="text-md  text-zinc-400">{{ $date }}</div>
</div>
  </div>
</div>
