<div id="footer-content">
    <div class="flex flex-wrap gap-2 mx-auto px-5 pt-24 sm:flex-row items-center">
        {{-- App Logo --}}
        @if($setting->logo)
        <img src="{{ asset('storage/' . $setting->logo) }}" alt="{{ $setting->name }}" class="w-8 h-8 mr-4">
        @else
        <x-ui.logo />
        @endif
        {{-- App Name --}}
        <p class=" text-sm text-center sm:text-left">
            © {{ date('Y') }} - {{$setting->name}}
        </p>
        {{-- Social Network --}}
        <div class="sm:ml-auto sm:mt-0 mt-2 sm:w-auto w-full sm:text-left text-center text-sm">
            <x-ui.social-network />
        </div>
    </div>
</div>
