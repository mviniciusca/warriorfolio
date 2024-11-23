@aware(['page'])
@props(['is_active' => true, 'heading' => null, 'content' => null, 'is_center' => false , 'heading_text_size' =>
'text-3xl', 'content_text_size' => 'text-xl', 'image' => null])

@if($is_active)
<x-core.layout>
    <div class="mx-auto max-w-screen-xl {{ $is_center ? 'text-center':'text-left' }}">
        <div id="heading-component">
            <div class="grid mx-auto lg:gap-8 py-6 lg:grid-cols-12">
                <div class="{{ $image ? 'col-span-7' : 'col-span-full' }}"> @if($heading)
                    <h2 class="heading-module-title mb-8 font-bold tracking-tighter {{ $heading_text_size }}">
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
                <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                    <img src="{{ asset('storage/' . $image) }}" />
                </div>
                @endif

            </div>
        </div>
</x-core.layout>
@endif