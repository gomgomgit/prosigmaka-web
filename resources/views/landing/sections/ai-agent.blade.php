<section id="ai-agent" class="assistant-section section-shell" data-section>
    <div class="page-container assistant-layout">
        <div class="assistant-copy reveal">
            <div class="assistant-intro">
                <p class="eyebrow">Meet NEA, our AI assistant</p>
                <h2>From question to<br><span class="text-gradient">useful next step.</span></h2>
            </div>
        </div>

        <div class="assistant-demo reveal" data-delay="120">
            <div class="demo-topbar">
                <div class="demo-agent">
                    <span><img src="{{ asset('assets/prosigmaka/photos/pala-v2.png') }}" alt="NEA AI Assistant"></span>
                    <div><strong>NEA AI</strong><small><i></i> Online · Prosigmaka knowledge</small></div>
                </div>
                <span class="demo-secure">Live assistant · Try it now</span>
            </div>

            <div id="chat-messages" class="chat-messages" aria-live="polite">
                <div class="chat-row chat-row-ai">
                    <div class="chat-bubble">Hi! I’m NEA. Tell me about your digital goals or challenges—I’ll help you find the right place to start.</div>
                </div>
                <div class="chat-row chat-row-user chat-preview-user">
                    <div class="chat-bubble">We want to adopt AI, but we’re not sure which use cases to prioritize.</div>
                </div>
                <div class="chat-row chat-row-ai chat-preview-ai">
                    <div class="chat-bubble">We can start with repetitive workflows and knowledge bottlenecks. ProSigmaka can support discovery, prototyping, and implementation of a measurable assistant.</div>
                </div>
            </div>

            <div class="quick-prompts" aria-label="Quick prompts">
                <span class="quick-prompts-label">Try asking NEA</span>
                <button type="button" data-quick-prompt="Which services fit our company’s digital transformation?">Plan digital transformation</button>
                <button type="button" data-quick-prompt="How can ProSigmaka help with our tech talent needs?">Build a tech team</button>
                <button type="button" data-quick-prompt="What AI solutions can ProSigmaka build?">Explore AI solutions</button>
            </div>

            <div id="typing-indicator" class="typing-indicator" hidden><span></span><span></span><span></span> NEA is thinking</div>
            <form class="chat-composer" data-chat-form>
                <label for="chat-input" class="sr-only">Ask NEA a question</label>
                <input id="chat-input" type="text" placeholder="Ask NEA about your business challenge..." autocomplete="off">
                <button id="send-button" type="submit" aria-label="Send message">
                    <svg viewBox="0 0 24 24" aria-hidden="true"><path d="m4 4 16 8-16 8 3-8-3-8Z"/><path d="M7 12h13"/></svg>
                </button>
            </form>
            <p class="demo-disclaimer">AI can make mistakes. For project decisions, connect with our team.</p>
        </div>
    </div>
</section>
