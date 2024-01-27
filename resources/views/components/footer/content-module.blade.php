<div id="footer-content">
    <div class="mx-auto flex flex-wrap items-center gap-2 px-5 sm:flex-row">
        {{-- App Logo --}}
        @if($setting->logo)
        <img src="{{ asset('storage/' . $setting->logo) }}" alt="{{ $setting->name . 'logo-image'}}"
            class="mr-4 h-8 w-8">
        @else
        <x-ui.logo />
        @endif
        {{-- App Name --}}
        <p class="text-center text-sm sm:text-left">
            © {{ date('Y') . ' - ' . $setting->name }}
        </p>
        {{-- Social Network --}}
        <div class="mt-2 w-full text-center text-sm sm:ml-auto sm:mt-0 sm:w-auto sm:text-left">
            <x-ui.social-network />
        </div>
    </div>
</div>
