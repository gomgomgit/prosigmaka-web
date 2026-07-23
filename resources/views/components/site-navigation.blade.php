@props([
    'sections',
    'onLanding' => false,
])

@php
    $navigationLabels = [
        'home' => 'Home',
        'clients' => 'Clients',
        'services' => 'Solutions',
        'case-study' => 'Impact',
        'ai-agent' => 'NEA AI',
        'blog' => 'Insights',
    ];
@endphp

<header {{ $attributes->merge(['class' => 'site-header']) }} data-site-header>
    <nav class="site-nav" aria-label="Main navigation">
        <a href="{{ $onLanding ? '#home' : route('landing') }}" class="brand-mark" aria-label="Prosigmaka home">
            <img src="{{ asset('assets/prosigmaka/logo-prosigmaka-white.png') }}" alt="Prosigmaka" class="brand-logo brand-logo-dark">
            <img src="{{ asset('assets/prosigmaka/logo-prosigmaka.png') }}" alt="" class="brand-logo brand-logo-light" aria-hidden="true">
        </a>

        <div class="nav-links" aria-label="Section navigation">
            @foreach ($sections as $navigationSection)
                @if (isset($navigationLabels[$navigationSection->key]))
                    <a
                        href="{{ ($onLanding ? '' : route('landing')).'#'.$navigationSection->key }}"
                        @class(['is-active' => ! $onLanding && $navigationSection->key === 'blog'])
                        data-nav-link
                    >{{ $navigationLabels[$navigationSection->key] }}</a>
                @endif
            @endforeach
        </div>

        <div class="nav-actions">
            <button type="button" class="icon-button theme-toggle-btn" aria-label="Switch theme" aria-pressed="false">
                <svg class="theme-sun" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3V1m0 22v-2m9-9h2M1 12h2m16.36-6.36 1.42-1.42M3.22 20.78l1.42-1.42m14.72 0 1.42 1.42M3.22 3.22l1.42 1.42M17 12a5 5 0 1 1-10 0 5 5 0 0 1 10 0Z"/></svg>
                <svg class="theme-moon" viewBox="0 0 24 24" aria-hidden="true"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79Z"/></svg>
            </button>
            <a class="nav-cta" href="https://wa.me/6281292787801?text=Hello%20Prosigmaka%2C%20I%20would%20like%20to%20discuss%20our%20digital%20transformation%20needs." target="_blank" rel="noreferrer">Let’s talk</a>
            <button type="button" class="icon-button menu-toggle" aria-label="Open menu" aria-expanded="false" aria-controls="mobile-menu">
                <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
            </button>
        </div>
    </nav>

    <div id="mobile-menu" class="mobile-menu" hidden>
        @foreach ($sections as $navigationSection)
            @if (isset($navigationLabels[$navigationSection->key]))
                <a href="{{ ($onLanding ? '' : route('landing')).'#'.$navigationSection->key }}" data-mobile-link>
                    {{ $navigationLabels[$navigationSection->key] }} <span>0{{ $loop->iteration }}</span>
                </a>
            @endif
        @endforeach
        <a href="https://wa.me/6281292787801?text=Hello%20Prosigmaka%2C%20I%20would%20like%20to%20arrange%20a%20consultation." target="_blank" rel="noreferrer">Start a conversation</a>
    </div>
</header>
