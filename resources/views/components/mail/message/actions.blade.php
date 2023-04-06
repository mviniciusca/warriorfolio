@props(['message'])

<div clas="z-0 absolute" x-data="{ open: false }">
    <button @click="open = !open">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
            stroke-width="1.5" stroke="currentColor" class="h-8 w-8">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
        </svg>
    </button>

    <div x-show="open"
        class="absolute z-50 -ml-3 -mt-2 rounded-lg border border-zinc-100 bg-white p-4 opacity-100 shadow-lg"
        x-on:click.away="open = false">
        <x-mail.delete-message :message="$message" />
    </div>

</div>
