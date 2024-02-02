@aware(['page'])
@props(['is_active' => true, 'heading' => null, 'content' => null, 'is_center' => false , 'heading_text_size' =>
'text-3xl', 'content_text_size' => 'text-xl'])

@if($is_active)
<div class="mx-auto max-w-7xl">
    <div class="mx-auto max-w-screen-xl {{ $is_center ? 'text-center':'text-left' }}">
        <div id="heading-component">

            @if($heading)
            <h2 class="heading-module-title mb-4 font-bold tracking-tighter {{ $heading_text_size }}">
                {!! $heading!!}
            </h2>
            @endif

            @if($content)
            <div class="heading-module-subtitle mb-4 font-light {{ $content_text_size }}">
                {!! $content !!}
            </div>
            @endif

        </div>
    </div>
</div>
@endif
