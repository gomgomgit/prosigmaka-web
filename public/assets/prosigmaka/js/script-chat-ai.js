/**
 * ProSigmaka AI Chat System
 * Direct chat integration with the NEA inference API
 * */
// Configuration for API Integration - Global scope
const API_CONFIG = {
    // Direct inference endpoint. No login or project lookup is required.
    inferenceEndpoint: 'https://nea.alinnea.id/api/v1/projects/3e2ea441-ec9a-4b6c-a4fd-c55b1f54e638/inference',
    filteredKnowledgeSourceIds: '1782802783866',
    
    // Request timeout in milliseconds
    timeout: 30000,
    
    // Maximum retry attempts
    maxRetries: 3,
    
    // Retry delay in milliseconds
    retryDelay: 1000
};

// AI Chat functionality
const initChatFunctionality = () => {
    const chatInput = document.getElementById('chat-input');
    const sendButton = document.getElementById('send-button');
    const typingIndicator = document.getElementById('typing-indicator');
    const chatMessages = document.getElementById('chat-messages');
    
    if (!chatInput || !sendButton || !typingIndicator || !chatMessages) return;
    // Function to clean chunk references from AI response
    function removeChunkReferences(text) {
        if (!text) return '';
        
        // Remove chunk references like [1](#CHUNK-ed3824bf-7547-48d9-b8f5-e256b40cca52)
        // Pattern: [number](#CHUNK-uuid)
        const chunkPattern = /\[\d+\]\(#CHUNK-[a-f0-9-]+\)/g;
        
        return text.replace(chunkPattern, '').trim();
    }

    // Markdown parsing utility
    function parseMarkdown(text) {
        if (!text) return '';
        
        // Convert text to string if it's not already
        let html = String(text);
        
        // Parse bold text (**text** or __text__)
        html = html.replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>');
        html = html.replace(/__(.*?)__/g, '<strong>$1</strong>');
        
        // Parse italic text (*text* or _text_)
        html = html.replace(/\*(.*?)\*/g, '<em>$1</em>');
        html = html.replace(/_(.*?)_/g, '<em>$1</em>');
        
        // Parse inline code (`code`)
        html = html.replace(/`(.*?)`/g, '<code class="bg-gray-600 px-1 py-0.5 rounded text-xs">$1</code>');
        
        // Parse links [text](url)
        html = html.replace(/\[([^\]]*)\]\(([^)]*)\)/g, '<a href="$2" class="text-cyan-400 hover:text-cyan-300 underline" target="_blank" rel="noopener noreferrer">$1</a>');
        
        // Parse line breaks (double newline = paragraph, single newline = br)
        html = html.replace(/\n\n/g, '</p><p class="mb-2">');
        html = html.replace(/\n/g, '<br>');
        
        // Wrap in paragraph if not already wrapped
        if (!html.startsWith('<p')) {
            html = '<p class="mb-2">' + html + '</p>';
        }
        
        // Parse numbered lists (1. item)
        html = html.replace(/(\d+)\.\s+(.*?)(?=<br>|\d+\.|$)/g, '<div class="ml-4 mb-1">$1. $2</div>');
        
        // Parse bullet points (- item or * item)
        html = html.replace(/^[-*]\s+(.*?)(?=<br>|[-*]|$)/gm, '<div class="ml-4 mb-1">• $1</div>');
        
        return html;
    }

    // UI Helper Functions
    function addUserMessage(message) {
        const messageDiv = document.createElement('div');
        messageDiv.className = 'flex space-x-3 justify-end animate-fadeIn';
        const bubble = document.createElement('div');
        bubble.className = 'flex-1 max-w-xs sm:max-w-sm bg-gradient-to-br from-blue-600 to-purple-600 rounded-2xl rounded-br-none p-4 shadow-lg';
        const paragraph = document.createElement('p');
        paragraph.className = 'text-white text-sm sm:text-base';
        paragraph.textContent = message;
        bubble.appendChild(paragraph);
        messageDiv.appendChild(bubble);
        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function addAIMessage(message) {
        // Remove chunk references first, then parse markdown
        const cleanedMessage = removeChunkReferences(message);
        const parsedMessage = parseMarkdown(cleanedMessage);
        
        const messageDiv = document.createElement('div');
        messageDiv.className = 'flex space-x-3 animate-fadeIn';
        messageDiv.innerHTML = `
            <div class="flex-1 bg-blue-500/10 border border-cyan-400/20 rounded-2xl rounded-tl-none p-4 shadow-lg">
                <div class="text-gray-200 text-sm sm:text-base leading-relaxed">${parsedMessage}</div>
            </div>
        `;
        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    function showTypingIndicator() {
        typingIndicator.classList.remove('hidden');
    }

    function hideTypingIndicator() {
        typingIndicator.classList.add('hidden');
    }

    function disableChatInput() {
        sendButton.disabled = true;
        chatInput.disabled = true;
        chatInput.placeholder = 'Menunggu respons...';
    }

    function enableChatInput() {
        sendButton.disabled = false;
        chatInput.disabled = false;
        chatInput.placeholder = 'Mulai chat dengan AI...';
        chatInput.focus();
    }

    function showErrorMessage(message) {
        // Create temporary error display
        const errorDiv = document.createElement('div');
        errorDiv.className = 'fixed top-4 right-4 bg-red-500 text-white px-4 py-2 rounded-lg shadow-lg z-50';
        errorDiv.textContent = message;
        document.body.appendChild(errorDiv);
        
        setTimeout(() => {
            errorDiv.remove();
        }, 3000);
    }

    function addErrorMessage(message) {
        const messageDiv = document.createElement('div');
        messageDiv.className = 'flex space-x-3 animate-fadeIn';
        messageDiv.innerHTML = `
            <div class="flex-1 bg-gradient-to-br from-red-500/10 to-red-600/10 backdrop-blur-sm border border-red-400/20 rounded-2xl rounded-tl-none p-4 shadow-lg">
                <p class="text-red-300 text-sm sm:text-base leading-relaxed">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    ${message}
                </p>
            </div>
        `;
        chatMessages.appendChild(messageDiv);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    // API call function with retry mechanism
    async function callChatAPI(message, retryCount = 0) {
        const controller = new AbortController();
        const timeoutId = setTimeout(() => controller.abort(), API_CONFIG.timeout);
        
        try {
            const params = new URLSearchParams({
                human_message: message,
                filtered_knowledge_source_ids: API_CONFIG.filteredKnowledgeSourceIds
            });
            const inferenceURL = `${API_CONFIG.inferenceEndpoint}?${params.toString()}`;
            
            const response = await fetch(inferenceURL, {
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                signal: controller.signal
            });
            
            clearTimeout(timeoutId);
            
            // console.log('Chat API response status:', response.status);
            
            // Check if response is ok
            if (!response.ok) {
                const errorText = await response.text();
                // console.error('API Error Response:', errorText);
                throw new Error(`HTTP ${response.status}: ${response.statusText}`);
            }
            
            // Parse JSON response
            const data = await response.json();
            // console.log('Chat API response data:', data);
            
            // Validate response structure
            if (!data || typeof data !== 'object') {
                throw new Error('Invalid response format');
            }
            
            return data;
            
        } catch (error) {
            clearTimeout(timeoutId);
            // console.error('Chat API call error:', error);
            
            // Handle different error types
            if (error.name === 'AbortError') {
                throw new Error('Request timed out');
            }
            
            if (error.name === 'TypeError' && error.message.includes('Failed to fetch')) {
                throw new Error('Network connection failed');
            }
            
            // Retry mechanism for recoverable errors
            if (retryCount < API_CONFIG.maxRetries && isRetryableError(error)) {
                // console.warn(`API call failed, retrying... (${retryCount + 1}/${API_CONFIG.maxRetries})`);
                await new Promise(resolve => setTimeout(resolve, API_CONFIG.retryDelay));
                return await callChatAPI(message, retryCount + 1);
            }
            
            throw error;
        }
    }

    // Check if error is retryable
    function isRetryableError(error) {
        const retryableErrors = [
            'Network connection failed',
            'Request timed out',
            'HTTP 500',
            'HTTP 502',
            'HTTP 503',
            'HTTP 504'
        ];
        
        return retryableErrors.some(errorType => 
            error.message.includes(errorType)
        );
    }

    // Handle API errors with appropriate user feedback
    function handleChatError(error, originalMessage) {
        let errorMessage = 'Maaf, terjadi kesalahan. Silakan coba lagi.';
        
        if (error.message.includes('timed out')) {
            errorMessage = 'Koneksi timeout. Silakan periksa koneksi internet Anda dan coba lagi.';
        } else if (error.message.includes('Network connection failed')) {
            errorMessage = 'Tidak dapat terhubung ke server. Silakan periksa koneksi internet Anda.';
        } else if (error.message.includes('HTTP 429')) {
            errorMessage = 'Terlalu banyak permintaan. Silakan tunggu beberapa saat sebelum mencoba lagi.';
        } else if (error.message.includes('HTTP 401') || error.message.includes('HTTP 403')) {
            errorMessage = 'Akses ke layanan AI ditolak. Silakan coba lagi nanti.';
        } else if (error.message.includes('projects') && error.message.includes('inference')) {
            errorMessage = 'Layanan AI sedang tidak tersedia. Menggunakan respons lokal.';
        }
        
        // Log error for debugging
        // console.error('Chat Error Details:', {
        //     error: error.message,
        //     originalMessage: originalMessage,
        //     timestamp: new Date().toISOString()
        // });
        
        // Show error message to user
        addErrorMessage(errorMessage);
        
        setTimeout(() => {
            addAIMessage(getDefaultResponse(originalMessage));
        }, 1500);
    }

    // Get default response for fallback scenarios
    function getDefaultResponse(message) {
        return 'Maaf, saya sedang mengalami gangguan teknis. Silakan coba lagi nanti atau hubungi tim kami di info@prosigmaka.com untuk bantuan langsung.';
    }

    // Enhanced sendMessage function with API integration
    async function sendMessage() {
        const message = chatInput.value.trim();
        
        // Input validation
        if (!message) {
            showErrorMessage('Please enter a message');
            return;
        }
        
        if (message.length > 1000) {
            showErrorMessage('Message is too long. Please keep it under 1000 characters.');
            return;
        }
        
        // Check if previous request is still processing
        if (sendButton.disabled) {
            return;
        }
        
        // Add user message to chat
        addUserMessage(message);
        
        // Clear input and prepare UI for response
        chatInput.value = '';
        showTypingIndicator();
        disableChatInput();
        
        try {
            // Call API with retry mechanism
            const response = await callChatAPI(message);
            
            // Handle successful response
            if (response && response.result.ai_message) {
                addAIMessage(response.result.ai_message);
            } else {
                // Handle empty or invalid response
                addAIMessage(getDefaultResponse(message));
            }
            
        } catch (error) {
            // console.error('Chat API Error:', error);
            handleChatError(error, message);
        } finally {
            // Always clean up UI state
            hideTypingIndicator();
            enableChatInput();
        }
    }

    // Event Handlers
    sendButton.addEventListener('click', sendMessage);
    
    chatInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            sendMessage();
        }
    });

    setTimeout(() => {
        addAIMessage('Halo! Saya adalah AI Assistant dari ProSigmaka. Saya siap membantu Anda dengan informasi tentang layanan kami!');
    }, 1000);
};

// Initialize chat system
function initializeChatSystem() {
    initChatFunctionality();
}

// Auto-initialize when DOM is ready
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initializeChatSystem);
} else {
    // DOM already loaded
    initializeChatSystem();
}
