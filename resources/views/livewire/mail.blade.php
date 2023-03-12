<div class="grid gap-3">

    {{-- Contact Form Component --}}

   <input type="text" wire:model='mail.name' placeholder="name" class="bg-zinc-900 p-3 text-zinc-500 border border-zinc-800">
   <span class="text-sm text-zinc-300">{{ $errors->first('mail.name') }}</span>

    <input type="text" wire:model='mail.email' placeholder="email" class="bg-zinc-900 p-3 text-zinc-500 border border-zinc-800">
    <span class="text-sm text-zinc-300">{{ $errors->first('mail.email') }}</span>

    <input type="text" wire:model='mail.subject' placeholder="subject" class="bg-zinc-900 p-3 text-zinc-500 border border-zinc-800">
    <span class="text-sm text-zinc-300">{{ $errors->first('mail.subject') }}</span>

    <textarea wire:model='mail.message' placeholder="message" class="bg-zinc-900 p-3 text-zinc-500 border border-zinc-800"></textarea>
    <span class="text-sm text-zinc-300">{{ $errors->first('mail.message') }}</span>

    <button wire:click='send' class="bg-zinc-900 flex items-center gap-1 justify-center text-zinc-500 w-1/3 p-4 hover:bg-orange-500 transition-all duration-150 hover:text-white lowercase font-bold">

    <!-- Heroicon -->

        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
        </svg>

        <span>Send</span>

    </button>

    {{-- Session Show sent message --}}
    @if (session()->has('message'))

        <!-- Apline hide after 4s -->
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)" class="bg-orange-600 fixed z-50 bottom-5 right-5 text-white font-semibold p-3">
            {{ session('message') }}
        </div>

    @endif


</div>
