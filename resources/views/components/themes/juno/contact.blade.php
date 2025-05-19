<div class="px-4">
    <x-themes.juno.partials.header :$title :$subtitle />

    <div class="grid gap-8 md:grid-cols-2">
        <!-- Contact Info Column -->
        <div class="space-y-6">
            <div>
                <h3 class="mb-4 text-sm font-medium">
                    Company Information</h3>
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
                    <div class="flex items-start gap-3">
                        <x-ui.ionicon class="mt-1 h-5 w-5" icon="time-outline" />
                        <div>
                            <p class="text-sm font-medium ">
                                Business Hours</p>
                            <p class="mt-1 text-sm">
                                Monday - Friday: 9:00 AM - 6:00 PM<br>
                                Saturday: 10:00 AM - 4:00 PM<br>
                                Sunday: Closed
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Form Column -->
        <div>
            @livewire('mail.create-mail')
        </div>
    </div>
</div>
