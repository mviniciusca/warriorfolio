@if ($is_active)
<div class="{{ $is_filled ? 'section-filled' : '' }}">
    <x-core.layout :$is_section_filled_inverted :$with_padding>
        <div class="py-8" id="footer-content">
            <div class="mx-auto">
                <div class="flex flex-col items-center justify-between space-y-4 md:flex-row md:space-y-0">
                    <div class="flex items-center space-x-4">
                        <x-ui.logo />
                        <span class="text-xs">
                            © {{ date('Y') }} {{ config('app.name', 'Warriorfolio') }}
                        </span>
                    </div>
                    <x-ui.social-network size="default" />
                </div>
            </div>
        </div>
    </x-core.layout>
</div>
@endif
