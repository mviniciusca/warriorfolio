@if ($is_active)
<div>
    <!-- Chat Button -->
    <button id="chatButton"
        class="fixed border saturn-border-inverse bottom-8 right-5 z-40 p-3 saturn-text-inverse rounded-full shadow-xl cursor-pointer flex items-center justify-center transition-all duration-300 hover:scale-110 group {{ $color ? '' : 'saturn-bg-inverse' }}"
        style="background-color: {{ $color }}">
        <x-ui.ionicon class="h-6 w-6" icon="logo-whatsapp" />
        </svg>
    </button>

    <!-- Chat Window -->
    <div id="chatWindow"
        class="fixed bottom-6 right-4 z-50 max-w-md saturn-bg rounded-xl border saturn-border transform scale-0 opacity-0 overflow-hidden transition-all duration-300 hidden">
        <!-- Header -->
        <div class="flex items-center justify-between p-4 border-b saturn-border">
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <div
                        class="w-10 h-10 rounded-full saturn-bg-accent border saturn-border flex items-center justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="absolute -bottom-1 -right-1 w-3 h-3 bg-green-500 rounded-full border-2 saturn-border">
                    </div>
                </div>
                <div>
                    <h3 class="font-semibold text-sm">{{ __('Whatsapp Chat') }}</h3>
                    <p class="text-xs">{{ __('Online now') }}</p>
                </div>
            </div>
            <button id="closeChat" class="p-2 hover:saturn-bg-accent rounded-full transition-colors duration-200">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Messages Area -->
        <div id="messagesArea" class="h-64 overflow-y-auto p-4 bg-saturn space-y-3">
            <!-- Initial Message -->
            <div id="initialMessage" class="animate-fade-in hidden">
                <div class="flex items-start space-x-3">
                    <div
                        class="w-8 h-8 saturn-bg-accent rounded-full border saturn-border flex items-center justify-center flex-shrink-0 shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="saturn-bg-accent rounded-xl px-3 py-2 max-w-xs border saturn-border">
                        <p class="text-xs leading-none">{{ $message ??
                            __('Hello! How can I help you today?') }}</p>
                        <span class="text-xs saturn-text-accent mt-1 block">{{ __('now')
                            }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Input Area -->
        <div class="p-3 border-t saturn-border">
            <div class="flex items-center space-x-2">
                <div class="flex-1 relative">
                    <input type="text" id="messageInput" placeholder="{{ __('Type your message...') }}"
                        class="w-full border saturn-border-accent saturn-bg rounded-full px-4 py-2 text-sm focus:outline-none focus:saturn-bg-accent placeholder-saturn-500  transition-all duration-200"
                        maxlength="500">
                </div>
                <button id="sendMessageButton"
                    class="w-8 h-8 p-2 saturn-bg-inverse saturn-text-inverse disabled:bg-saturn rounded-full flex items-center justify-center transition-all duration-200 hover:scale-105 shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                    </svg>
                </button>
            </div>
            <p class="text-xs mt-3 text-center leading-relaxed">
                {{ __('Press Enter to send your message') }}
            </p>
        </div>
    </div>

    <!-- WhatsApp Config -->
    <div data-whatsapp-url="{{ config('warriorfolio.whatsapp_web_url', env('WHATSAPP_WEB_URL')) }}"
        data-country-code="{{ config('warriorfolio.mobile_country_code', env('MOBILE_COUNTRY_CODE')) }}"
        data-mobile-number="{{ $mobile_number }}" class="hidden"></div>
</div>

<style>
    @keyframes fade-in {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in {
        animation: fade-in 0.5s ease-out;
    }

    #messagesArea::-webkit-scrollbar {
        width: 4px;
    }

    #messagesArea::-webkit-scrollbar-track {
        background: transparent;
    }

    #messagesArea::-webkit-scrollbar-thumb {
        background: rgb(148 163 184);
        border-radius: 4px;
    }

    #messagesArea::-webkit-scrollbar-thumb:hover {
        background: rgb(100 116 139);
    }

    .dark #messagesArea::-webkit-scrollbar-thumb {
        background: rgb(71 85 105);
    }

    .dark #messagesArea::-webkit-scrollbar-thumb:hover {
        background: rgb(100 116 139);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const chatButton = document.getElementById('chatButton');
    const chatWindow = document.getElementById('chatWindow');
    const closeChat = document.getElementById('closeChat');
    const messageInput = document.getElementById('messageInput');
    const sendMessageButton = document.getElementById('sendMessageButton');
    const messagesArea = document.getElementById('messagesArea');

    // WhatsApp configuration
    const whatsappUrl = document.querySelector('[data-whatsapp-url]').dataset.whatsappUrl;
    const countryCode = document.querySelector('[data-country-code]').dataset.countryCode;
    const mobileNumber = document.querySelector('[data-mobile-number]').dataset.mobileNumber;

    // Open chat window
    chatButton.addEventListener('click', function() {
        chatWindow.classList.remove('hidden');
        setTimeout(() => {
            chatWindow.classList.remove('scale-0', 'opacity-0');
            chatWindow.classList.add('scale-100', 'opacity-100');
        }, 10);

        setTimeout(() => {
            messageInput.focus();
        }, 300);

        // Show initial message with delay
        const initialMessage = document.getElementById('initialMessage');
        if (initialMessage && initialMessage.classList.contains('hidden')) {
            setTimeout(() => {
                initialMessage.classList.remove('hidden');
                messagesArea.scrollTop = messagesArea.scrollHeight;
            }, 500);
        }
    });

    // Close chat window
    function closeChatWindow() {
        chatWindow.classList.remove('scale-100', 'opacity-100');
        chatWindow.classList.add('scale-0', 'opacity-0');

        setTimeout(() => {
            chatWindow.classList.add('hidden');
        }, 300);
    }

    closeChat.addEventListener('click', closeChatWindow);

    // Add user message to chat
    function addUserMessage(message) {
        const messageDiv = document.createElement('div');
        messageDiv.className = 'flex justify-end animate-fade-in';
        messageDiv.innerHTML = `
            <div class="bg-secondary-900 dark:bg-secondary-700 text-white rounded-2xl rounded-br-md px-3 py-2 shadow-sm max-w-xs">
                <p class="text-sm leading-relaxed">${message}</p>
                <span class="text-xs text-secondary-300 dark:text-secondary-400 mt-1 block">{{ __('now') }}</span>
            </div>
        `;
        messagesArea.appendChild(messageDiv);
        messagesArea.scrollTop = messagesArea.scrollHeight;
    }

    // Add bot message to chat
    function addBotMessage(message, isRedirect = false) {
        const messageDiv = document.createElement('div');
        messageDiv.className = 'flex items-start space-x-3 animate-fade-in';

        const avatarClass = isRedirect ? 'bg-green-100 dark:bg-green-900' : 'bg-secondary-300 dark:bg-secondary-600';
        const avatarIconColor = isRedirect ? 'text-green-600 dark:text-green-400' : 'text-secondary-600 dark:text-secondary-300';

        messageDiv.innerHTML = `
            <div class="w-8 h-8 ${avatarClass} rounded-full flex items-center justify-center flex-shrink-0 shadow-sm">
                <svg class="w-4 h-4 ${avatarIconColor}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
            <div class="bg-white dark:bg-secondary-800 rounded-2xl rounded-tl-md px-3 py-2 shadow-sm max-w-xs border border-secondary-100 dark:border-secondary-800">
                <p class="text-sm text-secondary-800 dark:text-secondary-200 leading-relaxed">${message}</p>
                <span class="text-xs text-secondary-500 dark:text-secondary-400 mt-1 block">{{ __('now') }}</span>
            </div>
        `;
        messagesArea.appendChild(messageDiv);
        messagesArea.scrollTop = messagesArea.scrollHeight;
    }

    // Show typing indicator
    function showTypingIndicator() {
        const typingDiv = document.createElement('div');
        typingDiv.id = 'typing-indicator';
        typingDiv.className = 'flex items-start space-x-3 animate-fade-in';
        typingDiv.innerHTML = `
            <div class="w-8 h-8 bg-secondary-300 dark:bg-secondary-600 rounded-full flex items-center justify-center flex-shrink-0 shadow-sm">
                <svg class="w-4 h-4 text-secondary-600 dark:text-secondary-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
            <div class="bg-white dark:bg-secondary-800 rounded-2xl rounded-tl-md px-3 py-2 shadow-sm border border-secondary-100 dark:border-secondary-800">
                <div class="flex space-x-1">
                    <div class="w-2 h-2 bg-secondary-400 dark:bg-secondary-500 rounded-full animate-pulse"></div>
                    <div class="w-2 h-2 bg-secondary-400 dark:bg-secondary-500 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                    <div class="w-2 h-2 bg-secondary-400 dark:bg-secondary-500 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                </div>
            </div>
        `;
        messagesArea.appendChild(typingDiv);
        messagesArea.scrollTop = messagesArea.scrollHeight;
    }

    // Remove typing indicator
    function removeTypingIndicator() {
        const typing = document.getElementById('typing-indicator');
        if (typing) typing.remove();
    }

    // Send message function
    function sendMessage() {
        const message = messageInput.value.trim();
        if (message === '') return;

        // Disable input while processing
        messageInput.disabled = true;
        sendMessageButton.disabled = true;

        // Add user message
        addUserMessage(message);
        messageInput.value = '';

        // Show typing indicator
        setTimeout(() => {
            showTypingIndicator();
        }, 500);

        setTimeout(() => {
            removeTypingIndicator();
            addBotMessage('{{ __("Redirecting to WhatsApp...") }}', true);

            setTimeout(() => {
                const whatsappLink = `${whatsappUrl}${countryCode}${mobileNumber}/?text=${encodeURIComponent(message)}`;
                window.open(whatsappLink, '_blank');
                closeChatWindow();

                // Re-enable input
                messageInput.disabled = false;
                sendMessageButton.disabled = false;
            }, 1500);
        }, 1200);
    }

    // Send message on button click
    sendMessageButton.addEventListener('click', sendMessage);

    // Send message on Enter key press
    messageInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            sendMessage();
        }
    });
});
</script>
@endif
