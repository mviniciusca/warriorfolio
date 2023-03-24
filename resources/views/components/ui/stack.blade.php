 @props([
    'filename' => '',
])

 {{-- Stack Icons Hero Section --}}
 <div
     class="flex w-full items-center justify-center p-3 sm:h-14 sm:w-14 sm:justify-around sm:p-3 md:h-20 md:w-20 md:p-4">
     <img src="{{ asset('/img/stacks-logo/' . $filename . '.png') }}"
         id="{{ $filename }}-icon" alt="{{ $filename }} icon"
         width="100%" height="100%"
         class="transition-all duration-200 hover:-mt-4">
 </div>
