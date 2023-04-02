@props(['name', 'email', 'subject', 'datetime', 'id', 'mail'])

<div>
    <div class="flex font-bold text-zinc-500 text-sm gap-8 mb-1 p-4 rounded-lg content-between justify-start bg-zinc-50 hover:opacity-70 transition-all duration-100">
        <div class="cursor-pointer" id="star">

            <button class="hover:text-primary-500" wire:click="markStar('{{ $id }}')">

                @if($mail->is_starred)
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>
                @else
                <svg xmlns="http://www.w3.org/2000/svg" fill="orange" viewBox="0 0 24 24" stroke-width="1.5" stroke="orange" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                </svg>
                @endif
            </button>

        </div>
        <div class="w-1/5 overflow-x-hidden" id="name-email">
            <p>{{ $name }}</p>
            <p class="text-xs italic font-normal">{{ $email }}</p>
        </div>
        <div class="w-4/5 overflow-x-hidden" id="subject">
            <p>{{ $subject }}</p>
            <p class="text-xs font-normal">
                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $datetime, 'UTC')
                    ->timezone('America/Sao_Paulo')
                    ->format('d/m/Y H:i')
                }}
            </p>
        </div>
        <div class="justify-end" id="star">
            <div class="justify-end flex">
                <button wire:click="markTrash('{{ $id }}')">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>
