@props(['items' => null])

<div class="flex flex-wrap justify-center items-center gap-2">
    @if ($items ?? false)
        @foreach ($items as $social)
            @if ($social['is_active'] ?? false)
                <x-ui.icon :href="$social['profile_link']" :name="$social['social_network']" />
            @endif
        @endforeach
    @endif
    {{-- Empty Section --}}
    @if ($items == null)
        <x-ui.empty-section :auth="__('Update your Social Network.')" />
    @endif
</div>
