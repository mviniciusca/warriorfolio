export default function chatbox(whatsappUrl, countryCode, mobileNumber) {
    return {
        isOpen: false,
        showInitialMessage: false,
        messages: [],
        messageInput: '',
        isProcessing: false,
        whatsappUrl,
        countryCode,
        mobileNumber,

        init() {
            this.$watch('isOpen', (value) => {
                if (value) {
                    setTimeout(() => {
                        this.$refs.messageInput?.focus();
                        this.showInitialMessage = true;
                    }, 300);
                }
            });
        },

        openChat() {
            this.isOpen = true;
        },

        closeChat() {
            this.isOpen = false;
            this.messages = [];
            this.showInitialMessage = false;
        },

        addMessage(text, isUser = true) {
            this.messages.push({
                id: Date.now(),
                text,
                isUser,
                visible: true,
                isTyping: false,
                isRedirect: false
            });

            this.$nextTick(() => {
                this.$refs.messagesArea.scrollTop = this.$refs.messagesArea.scrollHeight;
            });
        },

        addTypingIndicator() {
            this.messages.push({
                id: Date.now(),
                isUser: false,
                visible: true,
                isTyping: true
            });
        },

        removeTypingIndicator() {
            this.messages = this.messages.filter(m => !m.isTyping);
        },

        async sendMessage() {
            const message = this.messageInput.trim();
            if (message === '' || this.isProcessing) return;

            this.isProcessing = true;
            this.addMessage(message, true);
            this.messageInput = '';

            // Show typing indicator with delay
            setTimeout(() => {
                this.addTypingIndicator();
            }, 500);

            // Show redirect message and redirect
            setTimeout(() => {
                this.removeTypingIndicator();
                this.addMessage('Redirecting to WhatsApp...', false);

                setTimeout(() => {
                    const whatsappLink = `${this.whatsappUrl}${this.countryCode}${this.mobileNumber}/?text=${encodeURIComponent(message)}`;
                    window.open(whatsappLink, '_blank');
                    this.closeChat();
                    this.isProcessing = false;
                }, 1500);
            }, 1200);
        },

        handleKeyPress(event) {
            if (event.key === 'Enter' && !event.shiftKey) {
                event.preventDefault();
                this.sendMessage();
            }
        }
    };
}
