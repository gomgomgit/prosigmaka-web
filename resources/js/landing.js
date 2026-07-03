const API_CONFIG = {
    inferenceEndpoint: 'https://nea.alinnea.id/api/v1/projects/3e2ea441-ec9a-4b6c-a4fd-c55b1f54e638/inference',
    filteredKnowledgeSourceIds: '1782802783866',
    timeout: 30000,
    maxRetries: 3,
    retryDelay: 1000,
};

document.addEventListener('DOMContentLoaded', () => {
    initVanta();
    initTypingHeadline();
    initChat();
});

function initVanta() {
    const target = document.getElementById('vanta-bg');

    if (!target) return;

    const boot = () => {
        if (!window.VANTA?.NET || !window.THREE) return;

        window.VANTA.NET({
            el: target,
            THREE: window.THREE,
            mouseControls: true,
            touchControls: true,
            gyroControls: false,
            minHeight: 200,
            minWidth: 200,
            scale: 1,
            scaleMobile: 1,
            color: 0x22d3ee,
            backgroundColor: 0x111827,
            points: 10,
            maxDistance: 22,
            spacing: 18,
        });
    };

    window.setTimeout(boot, 300);
}

function initTypingHeadline() {
    const element = document.querySelector('[data-typing-words]');
    if (!element) return;

    const words = element.dataset.typingWords.split(',').map((word) => word.trim()).filter(Boolean);
    if (words.length < 2) return;

    let index = 0;
    window.setInterval(() => {
        index = (index + 1) % words.length;
        element.textContent = words[index];
    }, 2400);
}

function initChat() {
    const input = document.getElementById('chat-input');
    const sendButton = document.getElementById('send-button');
    const typingIndicator = document.getElementById('typing-indicator');
    const messages = document.getElementById('chat-messages');

    if (!input || !sendButton || !typingIndicator || !messages) return;

    addMessage(messages, 'ai', 'Halo! Saya adalah AI Assistant dari ProSigmaka. Saya siap membantu Anda dengan informasi tentang layanan kami.');

    const sendMessage = async () => {
        const message = input.value.trim();
        if (!message || sendButton.disabled) return;

        addMessage(messages, 'user', message);
        input.value = '';
        setChatBusy(input, sendButton, typingIndicator, true);

        try {
            const response = await callChatApi(message);
            const aiMessage = response?.result?.ai_message || getFallbackResponse();
            addMessage(messages, 'ai', stripChunkReferences(aiMessage));
        } catch (error) {
            addMessage(messages, 'error', getErrorMessage(error));
            window.setTimeout(() => addMessage(messages, 'ai', getFallbackResponse()), 700);
        } finally {
            setChatBusy(input, sendButton, typingIndicator, false);
        }
    };

    sendButton.addEventListener('click', sendMessage);
    input.addEventListener('keydown', (event) => {
        if (event.key === 'Enter') {
            event.preventDefault();
            sendMessage();
        }
    });
}

function addMessage(container, type, text) {
    const row = document.createElement('div');
    const bubble = document.createElement('div');

    row.className = type === 'user' ? 'flex justify-end' : 'flex justify-start';
    bubble.className = type === 'user'
        ? 'max-w-[82%] rounded-2xl rounded-br-sm bg-cyan-400 px-4 py-3 text-sm font-semibold leading-6 text-slate-950'
        : type === 'error'
            ? 'max-w-[82%] rounded-2xl rounded-bl-sm border border-red-400/30 bg-red-500/10 px-4 py-3 text-sm leading-6 text-red-200'
            : 'max-w-[82%] rounded-2xl rounded-bl-sm border border-cyan-300/20 bg-cyan-300/10 px-4 py-3 text-sm leading-6 text-slate-100';

    bubble.textContent = text;
    row.appendChild(bubble);
    container.appendChild(row);
    container.scrollTop = container.scrollHeight;
}

function setChatBusy(input, button, indicator, isBusy) {
    input.disabled = isBusy;
    button.disabled = isBusy;
    indicator.classList.toggle('hidden', !isBusy);
    input.placeholder = isBusy ? 'Menunggu respons...' : 'Mulai chat dengan AI...';

    if (!isBusy) input.focus();
}

async function callChatApi(message, retryCount = 0) {
    const controller = new AbortController();
    const timeoutId = window.setTimeout(() => controller.abort(), API_CONFIG.timeout);

    try {
        const params = new URLSearchParams({
            human_message: message,
            filtered_knowledge_source_ids: API_CONFIG.filteredKnowledgeSourceIds,
        });

        const response = await fetch(`${API_CONFIG.inferenceEndpoint}?${params.toString()}`, {
            method: 'GET',
            headers: {
                Accept: 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
            },
            signal: controller.signal,
        });

        window.clearTimeout(timeoutId);

        if (!response.ok) {
            throw new Error(`HTTP ${response.status}`);
        }

        return response.json();
    } catch (error) {
        window.clearTimeout(timeoutId);

        if (retryCount < API_CONFIG.maxRetries && isRetryableError(error)) {
            await new Promise((resolve) => window.setTimeout(resolve, API_CONFIG.retryDelay));
            return callChatApi(message, retryCount + 1);
        }

        throw error;
    }
}

function isRetryableError(error) {
    return ['AbortError', 'HTTP 500', 'HTTP 502', 'HTTP 503', 'HTTP 504'].some((marker) => error.name === marker || error.message.includes(marker));
}

function getErrorMessage(error) {
    if (error.name === 'AbortError') return 'Koneksi timeout. Silakan coba lagi.';
    if (error.message.includes('HTTP 429')) return 'Terlalu banyak permintaan. Silakan tunggu sebentar.';
    if (error.message.includes('HTTP 401') || error.message.includes('HTTP 403')) return 'Akses ke layanan AI ditolak. Silakan coba lagi nanti.';
    return 'Maaf, terjadi kesalahan saat menghubungi layanan AI.';
}

function getFallbackResponse() {
    return 'Maaf, saya sedang mengalami gangguan teknis. Silakan coba lagi nanti atau hubungi tim kami melalui WhatsApp.';
}

function stripChunkReferences(text) {
    return String(text || '').replace(/\[\d+\]\(#CHUNK-[a-f0-9-]+\)/gi, '').trim();
}
