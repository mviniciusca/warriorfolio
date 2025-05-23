@props(['hero', 'justify' => 'center'])
{{-- Hero Section Button --}}
<div
    class="animate__animated animate__fadeInUp animate__delay-1s {{ $justify === 'center' ? 'justify-center' : ($justify === 'start' ? 'justify-start' : 'justify-end') }} z-10 mx-auto flex gap-4 py-4">
    @foreach ($hero->content['buttons'] as $button)
    <x-hero.button-group :color="$button['color'] ?? null" :icon="$button['icon']" :style="$button['button_style']"
        :target="$button['button_target']" :title="$button['button_title']" :url="$button['button_url']" />
    @endforeach
</div>
