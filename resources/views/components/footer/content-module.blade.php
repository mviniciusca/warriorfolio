<div class="mx-auto" id="footer-content">
    <div class="mx-auto flex flex-wrap items-center justify-center gap-2 py-4 text-center md:flex-row">
        {{-- App Logo --}}
        @if($setting->logo)
        <img src="{{ asset('storage/' . $setting->logo) }}" alt="{{ $setting->name . 'logo-image'}}"
            class="mr-4 h-8 w-8">
        @else
        <x-ui.logo />
        @endif
        {{-- App Name --}}
        <p class="text-center text-sm md:text-left">
            © {{ date('Y') . ' - ' . $setting->name }}
        </p>
        {{-- Social Network --}}
        <div class="order-1 w-full pt-4 text-center text-sm sm:mt-0 sm:w-auto sm:text-left md:ml-auto md:pt-0">
            <x-ui.social-network />
        </div>
    </div>
</div>
