<section id="footer-content">
    <div class="mx-auto p-4 py-6 lg:py-8 text-sm">
        <div class="md:flex md:justify-between">
            <div class="mb-6 md:mb-0">
                <x-ui.logo />
            </div>
            <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 sm:gap-6">
                <div>
                    <h2 class="mb-6 text-sm font-semibold uppercase">{{ __('Pages') }}
                    </h2>
                    <ul class="font-medium text-sm">
                        @foreach ($navigation as $item)
                        @isset($item['content'])
                        @foreach ($item['content'] as $content)
                        @if ($content['is_active'])
                        <li class="mb-4">
                            <a target="{{ $content['target'] }}" href="{{ $content['url'] }}"
                                class="hover:underline">{!! $content['name'] !!}</a>
                        </li>
                        @endif
                        @endforeach
                        @endisset
                        @endforeach
                    </ul>
                </div>
                @if ($social != null)
                <div>
                    <h2 class="mb-6 text-sm font-semibold uppercase">
                        {{ __('Follow') }}
                    </h2>
                    <ul class="font-medium">
                        @foreach ($social as $item)
                        @if ($item['is_active'])
                        <li class="mb-4 flex items-center">
                            <a target="_blank" href="{{ $item['profile_link'] }}" class="hover:underline">{{
                                ucfirst($item['social_network']) }}

                            </a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
        </div>
        <hr class="my-6 border-secondary-200 dark:border-secondary-800 sm:mx-auto" />
        <div class="sm:flex sm:items-center sm:justify-between">
            <span>
                {{-- App Name --}}
                <p class="text-center text-sm md:text-left">
                    © {{ date('Y') . ' - ' . data_get($setting, 'application.name', env('APP_NAME')) }}
                </p>
            </span>
            <div class="mt-4 flex sm:mt-0 sm:justify-center">
                <x-ui.social-network />
            </div>
        </div>
    </div>
</section>
