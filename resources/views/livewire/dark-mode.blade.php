<div>
    {{-- Switch component --}}
    <div class="flex items-center justify-center">
        <div class="relative inline-block w-10 mr-2 align-middle select-none transition-all duration-200 ease-in">
            <input wire:model.live="active" type="checkbox" id="toggle"
                class="toggle-checkbox absolute block w-6 h-6 rounded-full transition-all duration-100 bg-white border-4 appearance-none cursor-pointer" />
            <label for="toggle"
                class="toggle-label block overflow-hidden h-6 rounded-full transition-all duration-100 bg-gray-300 cursor-pointer"></label>
        </div>
        <label for="toggle" class="text-xs text-gray-700 dark:text-gray-300"></label>
        {{-- CSS ANimate Toggle button --}}
        <style>
            .toggle-checkbox:checked {
                @apply: right-0 border-green-400;
                right: 0;
                border-color: #68d391;
            }

            .toggle-checkbox:checked+.toggle-label {
                @apply: bg-green-400;
                background-color: #68d391;
            }

            .toggle-label {
                @apply: bg-gray-300;
                background-color: #cbd5e0;
            }

            .toggle-checkbox:checked+.toggle-label::before {
                @apply: translate-x-6 border-green-400;
                transform: translateX(100%);
                border-color: #68d391;
            }

            .toggle-checkbox:checked+.toggle-label::after {
                @apply: bg-green-400;
                background-color: #68d391;
            }
        </style>

    </div>