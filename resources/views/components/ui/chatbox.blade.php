@if ($is_active)
<div>
    <!-- Chat Button -->
    <div id="chatButton"
        class="chatbox align-center {{ $animation_style }} fixed bottom-5 right-5 z-50 flex cursor-pointer items-center overflow-hidden rounded-full p-3 text-center text-primary-50 transition-all duration-300 hover:opacity-80 hover:scale-110"
        style="background-color: {{ $color }}">
        <ion-icon class="text-3xl" name="{{ $icon ?? 'logo-whatsapp' }}"></ion-icon>
    </div>

    <!-- Chat Window -->
    <div id="chatWindow"
        class="fixed bottom-20 right-5 z-50 w-80 h-96 bg-white dark:bg-secondary-900 rounded-lg shadow-xl border border-secondary-200 dark:border-secondary-700 hidden animate__animated">
        <!-- Header -->
        <div
            class="bg-secondary-800 dark:bg-secondary-700 text-white p-4 rounded-t-lg flex items-center justify-between">
            <div class="flex items-center space-x-3">
                <div
                    class="w-10 h-10 bg-secondary-100 dark:bg-secondary-600 rounded-full flex items-center justify-center">
                    <ion-icon class="text-secondary-600 dark:text-secondary-300 text-xl" name="person"></ion-icon>
                </div>
                <div>
                    <h3 class="font-semibold text-sm text-secondary-100"></h3>
                    <div class="flex items-center space-x-1">
                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                        <p class="text-xs text-secondary-300">Online</p>
                    </div>
                </div>
            </div>
            <button id="closeChat"
                class="text-secondary-300 hover:text-white hover:bg-secondary-700 dark:hover:bg-secondary-600 rounded p-1 transition-colors">
                <ion-icon name="close" class="text-xl"></ion-icon>
            </button>
        </div>

        <!-- Messages Area -->
        <div class="h-64 overflow-y-auto p-4 bg-secondary-50 dark:bg-secondary-800"
            style="background-image: url('data:image/svg+xml,<svg xmlns=&quot;http://www.w3.org/2000/svg&quot; viewBox=&quot;0 0 100 100&quot;><defs><pattern id=&quot;whatsapp-bg&quot; x=&quot;0&quot; y=&quot;0&quot; width=&quot;100&quot; height=&quot;100&quot; patternUnits=&quot;userSpaceOnUse&quot;><circle cx=&quot;50&quot; cy=&quot;50&quot; r=&quot;1&quot; fill=&quot;%23a1a1aa&quot; opacity=&quot;0.1&quot;/></pattern></defs><rect width=&quot;100&quot; height=&quot;100&quot; fill=&quot;url(%23whatsapp-bg)&quot;/></svg>');">
            <!-- Initial Message (hidden by default) -->
            <div id="initialMessage" class="mb-4 animate__animated animate__fadeInUp hidden">
                <div class="flex items-start space-x-2">
                    <div
                        class="w-8 h-8 bg-secondary-600 dark:bg-secondary-500 rounded-full flex items-center justify-center flex-shrink-0">
                        <ion-icon class="text-white text-sm" name="person"></ion-icon>
                    </div>
                    <div
                        class="bg-white dark:bg-secondary-700 rounded-lg px-3 py-2 shadow-sm max-w-xs border border-secondary-200 dark:border-secondary-600">
                        <p class="text-sm text-secondary-800 dark:text-secondary-200">{{ $message ?? 'Olá! Como posso
                            ajudar você
                            hoje?' }}</p>
                        <span class="text-xs text-secondary-500 dark:text-secondary-400 mt-1 block">agora</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Input Area -->
        <div
            class="p-4 border-t border-secondary-200 dark:border-secondary-700 bg-white dark:bg-secondary-900 rounded-b-lg">
            <div class="flex items-center space-x-2">
                <input type="text" id="messageInput" placeholder="Digite sua mensagem..."
                    class="flex-1 border border-secondary-300 dark:border-secondary-600 bg-white dark:bg-secondary-800 text-secondary-800 dark:text-secondary-200 rounded-full px-4 py-2 text-sm focus:outline-none focus:border-green-500 dark:focus:border-green-400 placeholder-secondary-500 dark:placeholder-secondary-400"
                    maxlength="500">
                <button id="sendMessage"
                    class="bg-green-600 hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600 text-white rounded-full p-2 transition-colors duration-200">
                    <ion-icon name="send" class="text-lg"></ion-icon>
                </button>
            </div>
            <p class="text-xs text-secondary-500 dark:text-secondary-400 mt-2 text-center">
                Pressione Enter para enviar
            </p>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const chatButton = document.getElementById('chatButton');
    const chatWindow = document.getElementById('chatWindow');
    const closeChat = document.getElementById('closeChat');
    const messageInput = document.getElementById('messageInput');
    const sendMessage = document.getElementById('sendMessage');
    const messagesArea = chatWindow.querySelector('.h-64');

    // WhatsApp configuration
    const whatsappUrl = '{{ config("warriorfolio.whatsapp_web_url", env("WHATSAPP_WEB_URL")) }}';
    const countryCode = '{{ config("warriorfolio.mobile_country_code", env("MOBILE_COUNTRY_CODE")) }}';
    const mobileNumber = '{{ $mobile_number }}';

    // Open chat window
    chatButton.addEventListener('click', function() {
        chatWindow.classList.remove('hidden');
        chatWindow.classList.remove('animate__fadeOutDown');
        chatWindow.classList.add('animate__fadeInUp');
        messageInput.focus();

        // Show initial message when opening chat for the first time
        const initialMessage = document.getElementById('initialMessage');
        if (initialMessage && initialMessage.classList.contains('hidden')) {
            setTimeout(() => {
                initialMessage.classList.remove('hidden');
            }, 500);
        }
    });

    // Close chat window
    closeChat.addEventListener('click', function() {
        chatWindow.classList.remove('animate__fadeInUp');
        chatWindow.classList.add('animate__fadeOutDown');
        setTimeout(() => {
            chatWindow.classList.add('hidden');
        }, 300);
    });

    // Add user message to chat
    function addUserMessage(message) {
        const messageDiv = document.createElement('div');
        messageDiv.className = 'mb-4 flex justify-end animate__animated animate__fadeInUp';
        messageDiv.innerHTML = `
            <div class="bg-secondary-600 dark:bg-secondary-500 text-white rounded-lg px-3 py-2 shadow-sm max-w-xs">
                <p class="text-sm">${message}</p>
                <span class="text-xs opacity-75 mt-1 block">agora</span>
            </div>
        `;
        messagesArea.appendChild(messageDiv);
        messagesArea.scrollTop = messagesArea.scrollHeight;
    }

    // Send message function
    function sendMessageToWhatsApp() {
        const message = messageInput.value.trim();
        if (message === '') return;

        // Add message to chat interface
        addUserMessage(message);

        // Clear input
        messageInput.value = '';

        // Show typing indicator
        const typingDiv = document.createElement('div');
        typingDiv.className = 'mb-4 animate__animated animate__fadeInUp';
        typingDiv.id = 'typing-indicator';
        typingDiv.innerHTML = `
            <div class="flex items-start space-x-2">
                <div class="w-8 h-8 bg-secondary-600 dark:bg-secondary-500 rounded-full flex items-center justify-center flex-shrink-0">
                    <ion-icon class="text-white text-sm" name="person"></ion-icon>
                </div>
                <div class="bg-white dark:bg-secondary-700 rounded-lg px-3 py-2 shadow-sm border border-secondary-200 dark:border-secondary-600">
                    <div class="flex space-x-1">
                        <div class="w-2 h-2 bg-secondary-400 dark:bg-secondary-500 rounded-full animate-pulse"></div>
                        <div class="w-2 h-2 bg-secondary-400 dark:bg-secondary-500 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                        <div class="w-2 h-2 bg-secondary-400 dark:bg-secondary-500 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                    </div>
                </div>
            </div>
        `;
        messagesArea.appendChild(typingDiv);
        messagesArea.scrollTop = messagesArea.scrollHeight;

        // Simulate response and redirect to WhatsApp
        setTimeout(() => {
            // Remove typing indicator
            const typing = document.getElementById('typing-indicator');
            if (typing) typing.remove();

            // Add response message
            const responseDiv = document.createElement('div');
            responseDiv.className = 'mb-4 animate__animated animate__fadeInUp';
            responseDiv.innerHTML = `
                <div class="flex items-start space-x-2">
                    <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center flex-shrink-0">
                        <ion-icon class="text-white text-sm" name="person"></ion-icon>
                    </div>
                    <div class="bg-white dark:bg-secondary-700 rounded-lg px-3 py-2 shadow-sm max-w-xs border border-secondary-200 dark:border-secondary-600">
                        <p class="text-sm text-secondary-800 dark:text-secondary-200">Redirecionando para o WhatsApp...</p>
                        <span class="text-xs text-secondary-500 dark:text-secondary-400 mt-1 block">agora</span>
                    </div>
                </div>
            `;
            messagesArea.appendChild(responseDiv);
            messagesArea.scrollTop = messagesArea.scrollHeight;

            // Redirect to WhatsApp after a short delay
            setTimeout(() => {
                const whatsappLink = `${whatsappUrl}${countryCode}${mobileNumber}/?text=${encodeURIComponent(message)}`;
                window.open(whatsappLink, '_blank');

                // Close chat window
                closeChat.click();
            }, 1000);
        }, 1500);
    }

    // Send message on button click
    sendMessage.addEventListener('click', sendMessageToWhatsApp);

    // Send message on Enter key press
    messageInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            sendMessageToWhatsApp();
        }
    });

    // Close chat when clicking outside
    document.addEventListener('click', function(e) {
        if (!chatWindow.contains(e.target) && !chatButton.contains(e.target)) {
            if (!chatWindow.classList.contains('hidden')) {
                closeChat.click();
            }
        }
    });
});
</script>
@endif
