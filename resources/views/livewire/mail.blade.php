<div class="grid items-start gap-2 md:grid-cols-2 md:gap-3">

    {{-- Contact Form Component --}}
    <div class="grid gap-2">

        <input type="text" wire:model='mail.name' placeholder="name"
            class="border border-zinc-800 bg-zinc-900 p-3 text-zinc-500 outline-none focus:bg-zinc-700 focus:text-zinc-300 active:bg-zinc-900">

        @if ($errors->has('mail.name'))
            <span
                class="mb-4 text-sm italic text-red-500">{{ $errors->first('mail.name') }}</span>
        @endif

        <input type="text" wire:model='mail.email' placeholder="email"
            class="border border-zinc-800 bg-zinc-900 p-3 text-zinc-500 outline-none focus:bg-zinc-700 focus:text-zinc-300 active:bg-zinc-900">

        @if ($errors->has('mail.email'))
            <span
                class="mb-4 text-sm italic text-red-500">{{ $errors->first('mail.email') }}</span>
        @endif

        <input type="text" wire:model='mail.subject' placeholder="subject"
            class="border border-zinc-800 bg-zinc-900 p-3 text-zinc-500 outline-none focus:bg-zinc-700 focus:text-zinc-300 active:bg-zinc-900">

        @if ($errors->has('mail.subject'))
            <span
                class="mb-4 text-sm italic text-red-500">{{ $errors->first('mail.subject') }}</span>
        @endif

    </div>

    <div class="grid gap-2 md:h-full">

        <textarea rows="3" wire:model='mail.body' placeholder="message"
            class="h-full border border-zinc-800 bg-zinc-900 p-3 text-zinc-500 outline-none focus:bg-zinc-700 focus:text-zinc-300 active:bg-zinc-900"></textarea>

        @if ($errors->has('mail.body'))
            <span
                class="mb-4 text-sm italic text-red-500">{{ $errors->first('mail.body') }}</span>
        @endif

        <button wire:click='send'
            class="mt-1 flex w-1/4 items-center justify-center gap-1 border border-zinc-800 bg-zinc-900 p-3 font-bold lowercase text-zinc-500 transition-all duration-150 hover:bg-orange-500 hover:text-white">

            <!-- Heroicon -->

            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M4.5 12.75l6 6 9-13.5" />
            </svg>

            <!-- Heroicon -->

            <span>Send</span>

        </button>

    </div>

    {{-- Session Show sent body --}}
    @if (session()->has('body'))
        <!-- Apline hide after 4s -->
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
            class="fixed bottom-5 right-5 z-50 bg-orange-500 p-3 text-white">
            {{ session('body') }}
        </div>
    @endif

</div>
