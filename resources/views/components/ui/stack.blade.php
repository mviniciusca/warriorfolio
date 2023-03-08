 @props([
    'filename' => '',
])

{{-- Stack Icons Hero Section --}}
 <div class="flex h-20 w-20 items-center justify-center p-4">
     <img src="{{ url('/img/stacks-logo/'.$filename.'.png') }}" id="{{ $filename }}-icon" alt="{{ $filename }} icon" width="100%" height="100%">
 </div>
