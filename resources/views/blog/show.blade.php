<x-layouts.landing :title="$post->title.' - ProSigmaka'">
    <x-site-navigation :sections="$sections" />

    <main id="main-content" class="blog-page">
        <article class="blog-article">
            <a href="{{ route('landing') }}#blog" class="blog-back-link">Back to Insights</a>
            <p class="blog-published-at">{{ $post->published_at?->format('d M Y') }}</p>
            <h1>{{ $post->title }}</h1>
            @if ($post->excerpt)
                <p class="blog-excerpt">{{ $post->excerpt }}</p>
            @endif
            @if ($post->featured_image)
                <img src="{{ asset('storage/'.$post->featured_image) }}" alt="{{ $post->title }}" class="blog-featured-image">
            @endif
            <div class="blog-content">
                {!! $post->content !!}
            </div>
        </article>
    </main>
</x-layouts.landing>
