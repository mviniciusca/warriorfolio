@aware(['page'])
@props([
'is_active' => true,
'module_name' => null,
'title' => null,
'subtitle' => null,
'content' => null,
'attributes' => null,
])

@if($is_active)
<section class="{{  $attributes->merge()  }}">
    @if($title)
    <div class="header-title">
        {!! $title !!}
    </div>
    @endif
    @if($subtitle)
    <div class="subtitle mt-2 text-center text-xl">
        {!! $subtitle !!}
    </div>
    @endif
    @if($content)
    <div class="mt-24" id="{{ $module_name }}">
        {!! $content !!}
    </div>
    @endif
</section>
@endif
