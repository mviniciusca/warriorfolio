@props(['hero', 'justify' => 'center'])
{{-- Hero Section Button --}}
@isset($hero->content['buttons'])
<div
    class="animate__animated animate__fadeInUp animate__delay-1s {{ $justify === 'center' ? 'justify-center' : ($justify === 'start' ? 'justify-start' : 'justify-end') }} z-10 mx-auto flex gap-2 py-4">
    @foreach ($hero->content['buttons'] as $button)
    <x-themes.common.partials.hero.button-group :icon_before="$button['icon_before'] ?? null"
        :color="$button['color'] ?? null" :icon="$button['icon'] ?? null" :style="$button['button_style'] ?? null"
        :target="$button['button_target'] ?? null" :title="$button['button_title'] ?? null"
        :url="$button['button_url'] ?? null" :is_inverted="$button['is_inverted'] ?? null" />
    @endforeach
</div>
@endisset
