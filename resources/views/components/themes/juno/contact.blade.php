<div class="px-4">

    @if($is_heading_visible)
    <x-themes.juno.partials.header :$title :$subtitle />
    @endif

    <div class="grid gap-8 md:grid-cols-2 items-center">
        <!-- Contact Info Column -->
        <div class="space-y-6">
            <div>
                <div class="space-y-4">
                    @isset($content['address'])
                    <div class="flex items-start gap-3">
                        <x-ui.ionicon class="mt-1 h-5 w-5" icon="location-outline" />
                        <div>
                            <p class="text-sm font-medium">
                                {{ __('Address') }}</p>
                            <p>{!! $content['address'] ?? null !!} </p>
                        </div>
                    </div>
                    @endisset
                    @isset($content['phone'])
                    <div class="flex items-start gap-3">
                        <x-ui.ionicon class="mt-1 h-5 w-5" icon="call-outline" />
                        <div>
                            <p class="text-sm font-medium ">
                                Phone</p>
                            <p class="mt-1 text-sm  ">
                                {!! $content['phone'] !!}</p>
                        </div>
                    </div>
                    @endisset
                    @isset($content['email'])
                    <div class="flex items-start gap-3">
                        <x-ui.ionicon class="mt-1 h-5 w-5" icon="mail-outline" />
                        <div>
                            <p class="text-sm font-medium ">
                                Email</p>
                            <p class="mt-1 text-sm  ">
                                {{ $content['email'] ?? null }}</p>
                        </div>
                    </div>
                    @endisset
                    @isset($content['business_hour']))
                    <div class="flex items-start gap-3">
                        <x-ui.ionicon class="mt-1 h-5 w-5" icon="time-outline" />
                        <div>
                            <p class="text-sm font-medium ">
                                Business Hours</p>
                            <p class="mt-1 text-sm">
                                {!! $content['business_hour'] !!}
                            </p>
                        </div>
                    </div>
                    @endisset
                </div>
            </div>
        </div>
        <!-- Contact Form Column -->
        <div>
            @livewire('mail.create-mail')
        </div>
    </div>
</div>
