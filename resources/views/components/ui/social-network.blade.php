<div>
    @if ($items != null)
        @foreach ($items as $social)
            @if ($social['is_active'])
                <x-ui.icon :href="$social['profile_link']" :name="$social['social_network']" />
            @endif
        @endforeach
    @endif

    {{-- Empty Section --}}
    @if ($items == null)
        <x-ui.empty-section :auth="__('Go to your Dashboard and update your Social Network.')" />
    @endif

</div>
