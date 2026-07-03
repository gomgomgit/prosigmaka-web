<x-layouts.landing :title="$post->title.' - ProSigmaka'">
    <article class="min-h-screen bg-slate-950 py-20">
        <div class="mx-auto max-w-3xl px-6 lg:px-8">
            <a href="{{ route('landing') }}#blog" class="text-sm font-bold text-cyan-300 hover:text-cyan-200">Back to Blog</a>
            <p class="mt-10 text-xs font-bold uppercase tracking-[0.2em] text-cyan-300">{{ $post->published_at?->format('d M Y') }}</p>
            <h1 class="mt-4 text-4xl font-black leading-tight sm:text-6xl">{{ $post->title }}</h1>
            @if ($post->excerpt)
                <p class="mt-6 text-xl leading-8 text-slate-300">{{ $post->excerpt }}</p>
            @endif
            @if ($post->featured_image)
                <img src="{{ asset('storage/'.$post->featured_image) }}" alt="{{ $post->title }}" class="mt-10 w-full rounded-2xl object-cover">
            @endif
            <div class="prose prose-invert prose-cyan mt-10 max-w-none">
                {!! $post->content !!}
            </div>
        </div>
    </article>
</x-layouts.landing>
