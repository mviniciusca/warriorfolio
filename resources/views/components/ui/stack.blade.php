 @props([
    'filename' => '',
])

{{-- Stack Icons Hero Section --}}
 <div class="p-5 w-full flex items-center justify-center sm:p-3 sm:justify-around sm:w-14 sm:h-14 md:h-20 md:w-20 md:p-4">
     <img src="{{ asset('/img/stacks-logo/'.$filename.'.png') }}" id="{{ $filename }}-icon" alt="{{ $filename }} icon" width="100%" height="100%" class="hover:-mt-4 transition-all duration-200">
 </div>

