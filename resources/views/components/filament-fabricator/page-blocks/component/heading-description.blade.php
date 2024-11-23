@aware(['page'])
@props(['is_active' => true, 'heading' => null, 'content' => null, 'is_center' => false , 'heading_text_size' =>
'text-3xl', 'content_text_size' => 'text-xl', 'image' => null])

@if($is_active)
<x-core.layout>
    <div class="mx-auto max-w-screen-xl {{ $is_center ? 'text-center':'text-left' }}">
        <div id="heading-component">
            <div class="grid grid-cols-12 items-center">
                <div class="{{ $image ? 'col-span-6' : 'col-span-full' }}"> @if($heading)
                    <h2 class="heading-module-title mb-4 font-bold tracking-tighter {{ $heading_text_size }}">
                        {!! $heading !!}
                    </h2>
                    @endif

                    @if($content)
                    <div class="heading-module-subtitle mb-4 font-light {{ $content_text_size }}">
                        {!! $content !!}
                    </div>
                    @endif
                </div>
                @if($image)
                <div class="col-span-6">
                    <img class="max-w-lg" src="{{ asset('storage/' . $image) }}" </div>
                </div>
                @endif

            </div>
        </div>
</x-core.layout>
@endif