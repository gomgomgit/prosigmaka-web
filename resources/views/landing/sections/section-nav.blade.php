<div class="section-nav-menu">
    @foreach ($sections as $navSection)
        @php
            $navMap = [
                'home' => ['house.svg', 'Home'],
                'clients' => ['users.svg', 'Clients'],
                'services' => ['service.svg', 'Services'],
                'case-study' => ['stars.svg', 'Impact & Testimonials'],
                'ai-agent' => ['bot.svg', 'AI Assistant'],
                'blog' => ['stars.svg', 'Blog'],
            ];
            $navMeta = $navMap[$navSection->key] ?? null;
        @endphp
        @if ($navMeta)
            <div class="section-nav-item {{ $navSection->key === 'home' ? 'group active' : '' }} {{ $navSection->key === 'ai-agent' ? 'ai-agent-nav-item' : '' }}" onclick="scrollToSection('{{ $navSection->key }}')" data-section="{{ $navSection->key }}">
                <img class="nav-icon w-6 h-6 filter brightness-0 invert" src="{{ asset('assets/prosigmaka/svg-menu/'.$navMeta[0]) }}" alt="{{ $navMeta[1] }}" />
                <div class="nav-label">{{ $navMeta[1] }}</div>
            </div>
        @endif
    @endforeach
</div>
