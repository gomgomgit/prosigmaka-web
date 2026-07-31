<x-layouts.landing :title="$post->title.' - ProSigmaka'">
    <article class="relative min-h-screen overflow-hidden bg-slate-950 py-16 sm:py-20">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top,rgba(34,211,238,0.18),transparent_35%),radial-gradient(circle_at_80%_20%,rgba(59,130,246,0.14),transparent_28%),linear-gradient(180deg,rgba(15,23,42,0),rgba(15,23,42,0.9))]"></div>
        </div>

        <div class="relative z-10 mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <a href="{{ route('landing') }}#blog" class="inline-flex items-center gap-2 text-sm font-bold text-cyan-300 transition hover:text-cyan-200">
                <span aria-hidden="true">&larr;</span>
                <span>Back to Blog</span>
            </a>

            <div class="mt-8 overflow-hidden rounded-[2rem] border border-white/10 bg-white/5 shadow-[0_24px_80px_rgba(2,8,23,0.45)] backdrop-blur-sm">
                <div class="border-b border-white/10 px-5 py-8 sm:px-8 sm:py-10 lg:px-12">
                    <p class="text-xs font-bold uppercase tracking-[0.28em] text-cyan-300">{{ $post->published_at?->format('d M Y') }}</p>
                    <h1 class="mt-4 max-w-4xl text-4xl font-black leading-tight text-white sm:text-5xl lg:text-6xl">{{ $post->title }}</h1>

                    @if ($post->excerpt)
                        <p class="mt-6 max-w-3xl text-base leading-7 text-slate-300 sm:text-lg sm:leading-8">{{ $post->excerpt }}</p>
                    @endif
                </div>

                @if ($post->featured_image)
                    <div class="border-b border-white/10 bg-slate-950/70 p-3 sm:p-4 lg:p-5">
                        <div class="relative overflow-hidden rounded-[1.5rem] bg-slate-900 shadow-[0_30px_80px_rgba(8,47,73,0.35)]">
                            <div class="absolute inset-x-0 top-0 z-10 h-24 bg-gradient-to-b from-slate-950/30 to-transparent"></div>
                            <img
                                src="{{ asset('storage/'.$post->featured_image) }}"
                                alt="{{ $post->title }}"
                                class="h-auto max-h-[70vh] min-h-64 w-full object-cover object-center"
                            >
                        </div>
                    </div>
                @endif

                <div class="px-5 py-8 sm:px-8 sm:py-10 lg:px-12 lg:py-12">
                    <div class="blog-content prose prose-invert prose-cyan max-w-none">
                        {!! $post->content !!}
                    </div>
                </div>
            </div>
        </div>
    </article>
</x-layouts.landing>
