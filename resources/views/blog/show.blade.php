<x-layouts.landing
    :canonical="$seo['canonical']"
    :description="$seo['description']"
    :image="$seo['image']"
    :modified-time="$seo['modifiedTime']"
    :published-time="$seo['publishedTime']"
    :structured-data="$seo['structuredData']"
    :title="$seo['title']"
    :type="$seo['type']"
>
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
