<div class="grid md:grid-cols-2 md:gap-3 gap-2 items-start">

 {{-- Contact Form Component --}}
   <div class="grid gap-2">

        <input type="text" wire:model='mail.name' placeholder="name" class="bg-zinc-900 p-3 text-zinc-500 border border-zinc-800 focus:bg-zinc-700 focus:text-zinc-300 outline-none active:bg-zinc-900">

        @if ($errors->has('mail.name'))
            <span class="text-sm text-red-500 italic mb-4">{{ $errors->first('mail.name') }}</span>
        @endif

        <input type="text" wire:model='mail.email' placeholder="email" class="bg-zinc-900 p-3 text-zinc-500 border border-zinc-800 focus:bg-zinc-700 focus:text-zinc-300 outline-none active:bg-zinc-900">

        @if ($errors->has('mail.email'))
            <span class="text-sm text-red-500 italic mb-4">{{ $errors->first('mail.email') }}</span>
        @endif

        <input type="text" wire:model='mail.subject' placeholder="subject" class="bg-zinc-900 p-3 text-zinc-500 border border-zinc-800 focus:bg-zinc-700 focus:text-zinc-300 outline-none active:bg-zinc-900">

        @if ($errors->has('mail.subject'))
            <span class="text-sm text-red-500 italic mb-4">{{ $errors->first('mail.subject') }}</span>
        @endif

    </div>

    <div class="grid gap-2 md:h-full">

        <textarea rows="3" wire:model='mail.message' placeholder="message"
        class="bg-zinc-900 p-3 text-zinc-500 border h-full border-zinc-800 focus:bg-zinc-700 focus:text-zinc-300 outline-none active:bg-zinc-900"></textarea>

        @if ($errors->has('mail.message'))
            <span class="text-sm text-red-500 italic mb-4">{{ $errors->first('mail.message') }}</span>
        @endif

            <button wire:click='send' class="bg-zinc-900 flex items-center gap-1 justify-center border border-zinc-800 mt-1 text-zinc-500 w-1/4 p-3 hover:bg-orange-500 transition-all duration-150 hover:text-white lowercase font-bold">

            <!-- Heroicon -->

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
            </svg>

            <!-- Heroicon -->

            <span>Send</span>

        </button>

    </div>

    {{-- Session Show sent message --}}
    @if (session()->has('message'))

        <!-- Apline hide after 4s -->
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)" class="bg-orange-500 fixed z-50 bottom-5 right-5 text-white p-3">
            {{ session('message') }}
        </div>

    @endif


</div>
