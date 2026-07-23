@php
    $impactStories = [
        [
            'client' => 'Astra International',
            'industry' => 'Mobility & diversified enterprise',
            'logo' => 20,
            'challenge' => 'Scale technology delivery with talent that could contribute quickly across complex enterprise environments.',
            'solution' => 'A long-term tech talent partnership supported by role-specific sourcing and customized bootcamps.',
            'capabilities' => ['Java engineering', 'SAP Hybris', 'Automation QA', 'Talent deployment'],
            'outcome' => 'Capacity to deliver up to 100 skilled professionals aligned to exact competency needs.',
            'accent' => 'orange',
        ],
        [
            'client' => 'TMMIN',
            'industry' => 'Automotive manufacturing',
            'logo' => 19,
            'challenge' => 'Form agile, cross-functional squads able to accelerate digital transformation initiatives.',
            'solution' => 'End-to-end squad enablement from team composition and role matching to delivery readiness.',
            'capabilities' => ['Scrum Master', 'System Analysis', 'Software Engineering', 'UI/UX Design'],
            'outcome' => 'High-performing squads equipped to move from business challenge to working digital product.',
            'accent' => 'cyan',
        ],
        [
            'client' => 'PT Mitra Transaksi Indonesia',
            'industry' => 'Digital payments',
            'logo' => 15,
            'challenge' => 'Secure specialized digital-payment talent from junior through middle-up levels in a competitive market.',
            'solution' => 'A bootcamp-to-hire and managed talent model built around payment-industry requirements.',
            'capabilities' => ['Talent assessment', 'Custom bootcamp', 'Tech placement', 'After-sales support'],
            'outcome' => 'A repeatable pipeline of industry-ready professionals and a partnership sustained since 2021.',
            'accent' => 'violet',
        ],
    ];

    $testimonials = [
        [
            'quote' => 'ProSigmaka’s program supports Yokke’s operations and business. It meets our needs and has made a positive contribution.',
            'name' => 'Widiya Mahati',
            'role' => 'HR Head, PT Mitra Transaksi Indonesia',
            'initials' => 'WM',
        ],
        [
            'quote' => 'The candidates provided were an excellent fit for MTI’s needs, and ProSigmaka’s after-sales support has also been outstanding.',
            'name' => 'Andrew Tasidjawa',
            'role' => 'Head Backend Development, PT Mitra Transaksi Indonesia',
            'initials' => 'AT',
        ],
        [
            'quote' => 'The material was delivered clearly and systematically by knowledgeable instructors. It was highly relevant to our team’s day-to-day work.',
            'name' => 'Andreas Eirison',
            'role' => 'PT Karyaputra Suryagemilang',
            'initials' => 'AE',
        ],
    ];
@endphp

<section id="case-study" class="content-section impact-section section-shell" data-section>
    <div class="section-glow section-glow-left" aria-hidden="true"></div>
    <div class="page-container">
        <div class="section-heading reveal">
            <div>
                <p class="section-kicker">Impact stories</p>
                <h2>Complex challenges.<br><span class="text-gradient">Measurable momentum.</span></h2>
            </div>
            <p>How we combine talent, engineering, and learning to create capabilities that keep delivering after launch.</p>
        </div>

        <div class="impact-carousel reveal" data-impact-carousel>
            <div class="impact-track" data-impact-track>
                @foreach ($impactStories as $story)
                    <article class="impact-slide" data-accent="{{ $story['accent'] }}">
                        <div class="impact-identity">
                            <span class="impact-index">0{{ $loop->iteration }} / 03</span>
                            <div class="impact-logo"><img src="{{ asset('assets/prosigmaka/clients/'.$story['logo'].'.png') }}" alt="{{ $story['client'] }}"></div>
                            <p>{{ $story['industry'] }}</p>
                            <h3>{{ $story['client'] }}</h3>
                        </div>
                        <div class="impact-content">
                            <div class="impact-story-grid">
                                <div><span>Challenge</span><p>{{ $story['challenge'] }}</p></div>
                                <div><span>Solution</span><p>{{ $story['solution'] }}</p></div>
                            </div>
                            <div class="impact-capabilities">
                                <span>Delivered capabilities</span>
                                <div>
                                    @foreach ($story['capabilities'] as $capability)
                                        <i>{{ $capability }}</i>
                                    @endforeach
                                </div>
                            </div>
                            <div class="impact-outcome"><span>Outcome</span><strong>{{ $story['outcome'] }}</strong></div>
                        </div>
                    </article>
                @endforeach
            </div>
            <div class="carousel-controls">
                <button type="button" data-carousel-previous aria-label="Previous impact story">←</button>
                <div class="carousel-progress"><i data-carousel-progress></i></div>
                <button type="button" data-carousel-next aria-label="Next impact story">→</button>
            </div>
        </div>

        <div class="testimonial-heading reveal">
            <p class="section-kicker">In their words</p>
            <h2>Partnership, proven.</h2>
        </div>
        <div class="testimonials-grid">
            @foreach ($testimonials as $testimonial)
                <figure class="testimonial-card reveal" data-delay="{{ $loop->index * 80 }}">
                    <span class="quote-mark">“</span>
                    <blockquote>{{ $testimonial['quote'] }}</blockquote>
                    <figcaption>
                        <i>{{ $testimonial['initials'] }}</i>
                        <div><strong>{{ $testimonial['name'] }}</strong><span>{{ $testimonial['role'] }}</span></div>
                    </figcaption>
                </figure>
            @endforeach
        </div>
    </div>
</section>
