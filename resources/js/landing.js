const CHAT_API = {
    endpoint: 'https://nea.alinnea.id/api/v1/projects/3e2ea441-ec9a-4b6c-a4fd-c55b1f54e638/inference',
    knowledgeSourceIds: '1782802783866',
    timeout: 30000,
};

document.addEventListener('DOMContentLoaded', () => {
    initializeTheme();
    initializeNavigation();
    initializeReveals();
    initializeImpactCarousel();
    initializeChat();
});

function initializeTheme() {
    const buttons = document.querySelectorAll('.theme-toggle-btn');
    const systemTheme = window.matchMedia('(prefers-color-scheme: dark)');
    const getStoredTheme = () => {
        const storedTheme = localStorage.getItem('prosigmaka-theme');

        return ['light', 'dark'].includes(storedTheme) ? storedTheme : null;
    };

    const applyTheme = (theme, persist = false) => {
        const normalizedTheme = theme === 'light' ? 'light' : 'dark';
        document.documentElement.dataset.theme = normalizedTheme;
        document.querySelector('meta[name="theme-color"]')?.setAttribute('content', normalizedTheme === 'light' ? '#f5f7fa' : '#06080d');
        if (persist) {
            localStorage.setItem('prosigmaka-theme', normalizedTheme);
        }
        buttons.forEach((button) => button.setAttribute('aria-pressed', normalizedTheme === 'light' ? 'true' : 'false'));
    };

    applyTheme(document.documentElement.dataset.theme);
    buttons.forEach((button) => button.addEventListener('click', () => {
        applyTheme(document.documentElement.dataset.theme === 'light' ? 'dark' : 'light', true);
    }));
    systemTheme.addEventListener('change', (event) => {
        if (getStoredTheme() === null) {
            applyTheme(event.matches ? 'dark' : 'light');
        }
    });
}

function initializeNavigation() {
    const header = document.querySelector('[data-site-header]');
    const menuButton = document.querySelector('.menu-toggle');
    const menu = document.getElementById('mobile-menu');
    const sections = [...document.querySelectorAll('[data-section]')];

    const closeMenu = () => {
        if (!menu || !menuButton) return;
        menu.hidden = true;
        menuButton.setAttribute('aria-expanded', 'false');
        document.body.classList.remove('menu-open');
    };

    menuButton?.addEventListener('click', () => {
        const isOpening = menu?.hidden ?? false;
        if (menu) menu.hidden = !isOpening;
        menuButton.setAttribute('aria-expanded', isOpening ? 'true' : 'false');
        document.body.classList.toggle('menu-open', isOpening);
    });

    menu?.querySelectorAll('a').forEach((link) => link.addEventListener('click', closeMenu));
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape') closeMenu();
    });

    const updateHeader = () => header?.classList.toggle('is-scrolled', window.scrollY > 24);
    updateHeader();
    window.addEventListener('scroll', updateHeader, { passive: true });

    if (!sections.length) return;

    const sectionObserver = new IntersectionObserver((entries) => {
        const visibleEntry = entries
            .filter((entry) => entry.isIntersecting)
            .sort((first, second) => second.intersectionRatio - first.intersectionRatio)[0];

        if (!visibleEntry) return;
        const activeId = visibleEntry.target.id;
        document.querySelector('[data-floating-assistant]')?.classList.toggle('is-hidden', activeId === 'ai-agent');
        document.querySelectorAll('[data-nav-link], [data-section-dot]').forEach((link) => {
            link.classList.toggle('is-active', link.getAttribute('href') === `#${activeId}` || link.dataset.sectionDot === activeId);
        });
    }, { rootMargin: '-30% 0px -55%', threshold: [0, 0.2, 0.5] });

    sections.forEach((section) => sectionObserver.observe(section));
}

function initializeReveals() {
    const elements = document.querySelectorAll('.reveal');

    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
        elements.forEach((element) => element.classList.add('is-visible'));
        return;
    }

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            const delay = Number(entry.target.dataset.delay || 0);
            window.setTimeout(() => entry.target.classList.add('is-visible'), delay);
            observer.unobserve(entry.target);
        });
    }, { threshold: 0.12 });

    elements.forEach((element) => observer.observe(element));
}

function initializeImpactCarousel() {
    const carousel = document.querySelector('[data-impact-carousel]');
    const track = carousel?.querySelector('[data-impact-track]');
    const slides = [...(track?.children || [])];
    const progress = carousel?.querySelector('[data-carousel-progress]');
    let currentIndex = 0;
    let autoplayId;
    let touchStart = 0;

    if (!carousel || !track || slides.length < 2) return;

    const showSlide = (index) => {
        currentIndex = (index + slides.length) % slides.length;
        track.style.transform = `translateX(-${currentIndex * 100}%)`;
        if (progress) progress.style.width = `${((currentIndex + 1) / slides.length) * 100}%`;
    };

    const stopAutoplay = () => window.clearInterval(autoplayId);
    const startAutoplay = () => {
        stopAutoplay();
        if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            autoplayId = window.setInterval(() => showSlide(currentIndex + 1), 7000);
        }
    };

    carousel.querySelector('[data-carousel-previous]')?.addEventListener('click', () => {
        showSlide(currentIndex - 1);
        startAutoplay();
    });
    carousel.querySelector('[data-carousel-next]')?.addEventListener('click', () => {
        showSlide(currentIndex + 1);
        startAutoplay();
    });
    carousel.addEventListener('mouseenter', stopAutoplay);
    carousel.addEventListener('mouseleave', startAutoplay);
    carousel.addEventListener('touchstart', (event) => {
        touchStart = event.changedTouches[0].clientX;
        stopAutoplay();
    }, { passive: true });
    carousel.addEventListener('touchend', (event) => {
        const distance = event.changedTouches[0].clientX - touchStart;
        if (Math.abs(distance) > 45) showSlide(currentIndex + (distance < 0 ? 1 : -1));
        startAutoplay();
    }, { passive: true });

    showSlide(0);
    startAutoplay();
}

function initializeChat() {
    const form = document.querySelector('[data-chat-form]');
    const input = document.getElementById('chat-input');
    const button = document.getElementById('send-button');
    const messages = document.getElementById('chat-messages');
    const typingIndicator = document.getElementById('typing-indicator');

    if (!form || !input || !button || !messages || !typingIndicator) return;

    const submitMessage = async (message) => {
        const normalizedMessage = message.trim();
        if (!normalizedMessage || button.disabled) return;

        messages.querySelectorAll('.chat-preview-user, .chat-preview-ai').forEach((preview) => preview.remove());
        appendChatMessage(messages, 'user', normalizedMessage);
        input.value = '';
        setChatBusy(input, button, typingIndicator, true);

        try {
            const response = await requestChatResponse(normalizedMessage);
            appendChatMessage(messages, 'ai', cleanChatResponse(response?.result?.ai_message) || 'Let’s continue on WhatsApp so our team can help with the specifics.');
        } catch (error) {
            const errorMessage = error.name === 'AbortError'
                ? 'The connection is taking longer than expected. Please try again or contact our team on WhatsApp.'
                : 'Sorry, the AI service is currently unavailable. Our team is still ready to help on WhatsApp.';
            appendChatMessage(messages, 'ai', errorMessage);
        } finally {
            setChatBusy(input, button, typingIndicator, false);
        }
    };

    form.addEventListener('submit', (event) => {
        event.preventDefault();
        submitMessage(input.value);
    });

    document.querySelectorAll('[data-quick-prompt]').forEach((prompt) => prompt.addEventListener('click', () => {
        submitMessage(prompt.dataset.quickPrompt || '');
    }));
}

function appendChatMessage(container, type, message) {
    const row = document.createElement('div');
    const bubble = document.createElement('div');
    row.className = `chat-row chat-row-${type}`;
    bubble.className = 'chat-bubble';
    bubble.textContent = message;

    row.appendChild(bubble);
    container.appendChild(row);
    container.scrollTo({ top: container.scrollHeight, behavior: 'smooth' });
}

function setChatBusy(input, button, indicator, isBusy) {
    input.disabled = isBusy;
    button.disabled = isBusy;
    indicator.hidden = !isBusy;
    input.placeholder = isBusy ? 'NEA is thinking...' : 'Ask NEA about your business challenge...';
}

async function requestChatResponse(message) {
    const controller = new AbortController();
    const timeoutId = window.setTimeout(() => controller.abort(), CHAT_API.timeout);
    const query = new URLSearchParams({
        human_message: message,
        filtered_knowledge_source_ids: CHAT_API.knowledgeSourceIds,
    });

    try {
        const response = await fetch(`${CHAT_API.endpoint}?${query.toString()}`, {
            headers: { Accept: 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
            signal: controller.signal,
        });

        if (!response.ok) throw new Error(`HTTP ${response.status}`);
        return await response.json();
    } finally {
        window.clearTimeout(timeoutId);
    }
}

function cleanChatResponse(message) {
    return String(message || '')
        .replace(/\[\d+\]\(#CHUNK-[a-f0-9-]+\)/gi, '')
        .replace(/[*_`#>]/g, '')
        .trim();
}
