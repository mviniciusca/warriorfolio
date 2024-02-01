@aware(['page'])
@props([
'is_active' => true,'module_name' => null,'title' => null,'subtitle' => null,'tailwind_css_attributes' => null,
'slug' => null,
])

@if($is_active)
<x-core.layout class="{{ $tailwind_css_attributes  }}" id="{{ $slug }}">
    <section>
        @if($title)
        <div class="header-title">
            {!! $title !!}
        </div>
        @endif
        @if($subtitle)
        <div class="subtitle">
            {!! $subtitle !!}
        </div>
        @endif
    </section>
</x-core.layout>
@endif
