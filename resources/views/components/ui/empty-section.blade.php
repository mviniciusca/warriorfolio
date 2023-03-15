@props([
    'btn_icon'      => '',
    'btn_text'      => '',
    'link_path'     => '',
    'empty_icon'    => '',
    'empty_message' => '',

])
@auth
<div class="grid text-center lowercase justify-center w-auto">
   <div class="flex justify-center">
      <div class="text-6xl text-zinc-600 items-center mb-1 mt-8"><ion-icon name="{{ $empty_icon }}"></ion-icon></div>
   </div>
   <div class="text-zinc-400 text-sm">{{ $empty_message }}</div>
   <div class="flex justify-center mt-3">
    <a href="{{ url($link_path) }}">
      <button class="py-2 px-2 bg-zinc-800 border lowercase border-zinc-800 text-sm rounded-md text-white flex items-center w-auto text-center hover:bg-orange-500 transition-all duration-150">
         <ion-icon class="text-lg" name="{{ $btn_icon }}"></ion-icon>
         <span class="ml-2 text-xs">{{ $btn_text }}</span>
      </button>
    </a>
   </div>
</div>
@endauth
