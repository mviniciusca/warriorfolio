@props(['items' => null, 'justify' => 'center', 'size' => null])

{{-- Social Network Component --}}
<div {{ $attributes->class([
    'flex flex-wrap gap-4',
    $justify === 'center' ? 'justify-center items-center' : ($justify === 'start' ? 'justify-start items-start' : 'justify-end items-end')
]) }}>
    @if ($items ?? false)
        @foreach ($items as $social)
            @if ($social['is_active'] ?? false)
                <x-ui.icon :$size :href="$social['profile_link']" :name="$social['social_network']" />
            @endif
        @endforeach
    @endif
    {{-- Empty Section --}}
    @if ($items == null)
        <x-ui.empty-section :auth="__('Update your Social Network.')" />
    @endif
</div>
