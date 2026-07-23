<section id="blog" class="content-section insights-section section-shell" data-section>
    <div class="page-container">
        <div class="section-heading reveal">
            <div>
                <p class="section-kicker">Latest insights</p>
                <h2>Ideas for what<br><span class="text-gradient">comes next.</span></h2>
            </div>
            <p>Practical perspectives on digital transformation, technology talent, enterprise learning, and applied AI.</p>
        </div>

        @if ($posts->isNotEmpty())
            <div class="insights-grid">
                @foreach ($posts as $post)
                    <article class="insight-card reveal" data-delay="{{ ($loop->index % 3) * 80 }}">
                        <a href="{{ route('blog.show', $post) }}" class="insight-visual" aria-label="Read {{ $post->title }}">
                            @if ($post->featured_image)
                                <img src="{{ Storage::url($post->featured_image) }}" alt="" loading="lazy">
                            @else
                                <span class="insight-mesh" aria-hidden="true"></span>
                                <i>PS / INSIGHT 0{{ $loop->iteration }}</i>
                            @endif
                        </a>
                        <div class="insight-content">
                            <div class="insight-meta"><span>Insight</span><time datetime="{{ $post->published_at?->toDateString() }}">{{ $post->published_at?->translatedFormat('d M Y') }}</time></div>
                            <h3><a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a></h3>
                            <p>{{ $post->excerpt ?: Str::limit(strip_tags($post->content), 130) }}</p>
                            <a href="{{ route('blog.show', $post) }}" class="button button-primary insight-read-button">
                                Read insight
                                <span aria-hidden="true">→</span>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="insights-fallback reveal">
                <span>Field notes, coming soon</span>
                <h3>We’re preparing practical perspectives from the work.</h3>
                <p>In the meantime, tell us what transformation topic matters most to your team.</p>
                <a class="button button-secondary" href="https://wa.me/6281292787801?text=Hello%20Prosigmaka%2C%20I%20would%20like%20to%20discuss%20digital%20transformation." target="_blank" rel="noreferrer">Start a conversation</a>
            </div>
        @endif
    </div>
</section>
