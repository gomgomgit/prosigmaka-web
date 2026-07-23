@php
    $solutions = [
        [
            'number' => '01',
            'title' => 'Professional Services',
            'description' => 'Cross-functional technology teams that move critical initiatives from roadmap to reliable production.',
            'outcome' => 'Ship faster with accountable, enterprise-ready delivery.',
            'icon' => 'project-manager.svg',
            'capabilities' => ['Software engineering', 'Product squads', 'Digital modernization'],
        ],
        [
            'number' => '02',
            'title' => 'Head Hunting',
            'description' => 'Curated technology talent matched to your stack, culture, and delivery goals—not simply to a job description.',
            'outcome' => 'Reduce time-to-hire and build teams that perform.',
            'icon' => 'job-interview.svg',
            'capabilities' => ['Tech talent sourcing', 'Role assessment', 'Managed placement'],
        ],
        [
            'number' => '03',
            'title' => 'Learning Platform',
            'description' => 'A scalable digital learning ecosystem for capability mapping, structured programs, and measurable progress.',
            'outcome' => 'Turn learning investment into workforce readiness.',
            'icon' => 'online-education.svg',
            'capabilities' => ['LMS implementation', 'Learning journeys', 'Progress analytics'],
        ],
        [
            'number' => '04',
            'title' => 'AI Solutions',
            'description' => 'Practical AI assistants and workflow automation designed around secure enterprise knowledge and real operations.',
            'outcome' => 'Automate repetitive work and unlock faster decisions.',
            'icon' => 'ai-robot.svg',
            'capabilities' => ['AI assistants', 'Knowledge automation', 'Workflow intelligence'],
        ],
        [
            'number' => '05',
            'title' => 'Corporate Training',
            'description' => 'Instructor-led programs shaped by real business challenges, from technical depth to agile ways of working.',
            'outcome' => 'Build job-ready skills that teams can apply immediately.',
            'icon' => 'presentation-corporate.svg',
            'capabilities' => ['Custom bootcamps', 'Leadership programs', 'Technical upskilling'],
        ],
    ];
@endphp

<section id="services" class="content-section section-shell" data-section>
    <div class="section-glow section-glow-right" aria-hidden="true"></div>
    <div class="page-container">
        <div class="section-heading reveal">
            <div>
                <p class="section-kicker">What we solve</p>
                <h2>From ambition to<br><span class="text-gradient">working capability.</span></h2>
            </div>
            <p>Five connected solutions. One outcome: technology, people, and intelligence that compound business value.</p>
        </div>

        <div class="solutions-grid">
            @foreach ($solutions as $solution)
                <article class="solution-card reveal" data-delay="{{ ($loop->index % 3) * 80 }}">
                    <span class="solution-icon"><img src="{{ asset('assets/prosigmaka/svg/'.$solution['icon']) }}" alt="" aria-hidden="true"></span>
                    <div class="solution-card-top">
                        <span class="solution-number">{{ $solution['number'] }}</span>
                    </div>
                    <div>
                        <h3>{{ $solution['title'] }}</h3>
                        <p>{{ $solution['description'] }}</p>
                    </div>
                    <div class="solution-capabilities">
                        @foreach ($solution['capabilities'] as $capability)
                            <span>{{ $capability }}</span>
                        @endforeach
                    </div>
                    <div class="solution-outcome"><span>Business outcome</span><strong>{{ $solution['outcome'] }}</strong></div>
                </article>
            @endforeach

            <a href="https://wa.me/6281292787801?text=Hello%20Prosigmaka%2C%20I%20would%20like%20to%20discuss%20solutions%20for%20our%20business." target="_blank" rel="noreferrer" class="solution-cta reveal" aria-label="Start a conversation with ProSigmaka on WhatsApp">
                <span class="solution-cta-mark" aria-hidden="true">
                    <svg viewBox="0 0 16 16">
                        <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93a7.898 7.898 0 0 0-2.327-5.607ZM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.25a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.591-6.592 6.591Zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.066-.315-.099-.445.099-.133.197-.513.646-.627.775-.116.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.984-.59-.525-.986-1.173-1.102-1.371-.116-.198-.013-.306.087-.405.09-.088.197-.232.296-.346.1-.116.133-.198.198-.33.066-.133.033-.248-.017-.347-.05-.1-.445-1.073-.61-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.692.677-.692 1.654 0 .977.71 1.916.81 2.049.098.132 1.394 2.132 3.383 2.992.473.205.842.327 1.129.418.475.151.907.13 1.249.079.381-.057 1.17-.48 1.335-.943.164-.462.164-.857.115-.943-.05-.082-.182-.132-.38-.23Z"/>
                    </svg>
                </span>
                <span>Not sure where to start?</span>
                <h3>Let’s map your next move.</h3>
                <i>Start a conversation <span aria-hidden="true">↗</span></i>
            </a>
        </div>
    </div>
</section>
