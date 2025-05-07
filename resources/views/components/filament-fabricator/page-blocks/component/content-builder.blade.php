@aware(['page'])
@props([
'is_active' => true,
'section_id' => null,
'content_blocks' => [],
'with_container' => true,
'spacing' => 'md',
])

@if ($is_active)
<section id="{{ $section_id }}"
    class="content-builder-section py-{{ $spacing === 'sm' ? '4' : ($spacing === 'lg' ? '16' : '8') }}">
    @if ($with_container)
    <div class="container mx-auto px-4">
        @endif

        @foreach ($content_blocks as $block)
        @switch($block['type'])
        @case('text')
        <div class="prose max-w-none dark:prose-invert">
            {!! $block['data']['content'] !!}
        </div>
        @break

        @case('image')
        <figure class="my-4">
            <img src="{{ Storage::url($block['data']['image']) }}" alt="{{ $block['data']['alt_text'] ?? '' }}"
                class="w-full h-auto rounded-lg">
        </figure>
        @break

        @case('call_to_action')
        <div class="cta-block my-8 text-center">
            <h2 class="text-2xl font-bold mb-4">{{ $block['data']['title'] }}</h2>
            @if($block['data']['description'])
            <p class="mb-6">{{ $block['data']['description'] }}</p>
            @endif
            @if($block['data']['button_text'] && $block['data']['button_url'])
            <a href="{{ $block['data']['button_url'] }}" class="inline-flex items-center px-6 py-3 rounded-lg
                                    @if($block['data']['style'] === 'primary')
                                        bg-primary-600 text-white hover:bg-primary-700
                                    @elseif($block['data']['style'] === 'secondary')
                                        bg-secondary-600 text-white hover:bg-secondary-700
                                    @else
                                        border-2 border-primary-600 text-primary-600 hover:bg-primary-50
                                    @endif">
                {{ $block['data']['button_text'] }}
            </a>
            @endif
        </div>
        @break

        @case('columns')
        <div class="grid gap-8 my-8
                        @if($block['data']['columns_count'] == 2)
                            md:grid-cols-2
                        @elseif($block['data']['columns_count'] == 3)
                            md:grid-cols-3
                        @else
                            md:grid-cols-4
                        @endif">
            @foreach ($block['data']['columns'] as $column)
            <div class="prose max-w-none dark:prose-invert">
                {!! $column['content'] !!}
            </div>
            @endforeach
        </div>
        @break
        @endswitch
        @endforeach

        @if ($with_container)
    </div>
    @endif
</section>
@endif
