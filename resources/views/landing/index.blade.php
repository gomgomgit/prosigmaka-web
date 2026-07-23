<x-layouts.landing>
    <x-site-navigation :sections="$sections" :on-landing="true" />

    <main id="main-content">
        @foreach ($sections as $section)
            @if (view()->exists($section->blade_partial))
                @include($section->blade_partial, ['posts' => $posts])
            @endif
        @endforeach
    </main>

    @include('landing.sections.section-nav')
    @include('landing.sections.footer')

    @if ($sections->contains('key', 'ai-agent'))
        <a href="#ai-agent" class="floating-assistant" data-floating-assistant aria-label="Open NEA AI Assistant">
            <span class="assistant-status" aria-hidden="true"></span>
            <img src="{{ asset('assets/prosigmaka/photos/pala-v2.png') }}" alt="" aria-hidden="true">
            <span>Ask NEA</span>
        </a>
    @endif
</x-layouts.landing>
