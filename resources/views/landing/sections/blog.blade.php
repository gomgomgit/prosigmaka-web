<section id="blog" class="fullpage-section relative overflow-hidden bg-gradient-to-br from-gray-950 via-slate-900 to-gray-900">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 25% 25%, rgba(0,245,255,0.2) 1px, transparent 1px), radial-gradient(circle at 75% 75%, rgba(139,92,246,0.2) 1px, transparent 1px); background-size: 60px 60px;"></div>
    </div>
    <div class="absolute inset-0 bg-gradient-to-br from-cyan-900/10 via-transparent to-purple-900/20"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 py-16 lg:py-20">
        <div class="text-center mb-10 sm:mb-14">
            <h2 class="section-title text-3xl sm:text-4xl md:text-5xl lg:text-6xl text-ultra-bold text-white mb-4 sm:mb-6 tracking-tighter leading-tight">
                LATEST <span class="bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-600 bg-clip-text text-transparent text-glow">INSIGHTS</span>
            </h2>
            <p class="font-inter text-sm sm:text-lg md:text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed font-medium">
                Fresh perspectives from ProSigmaka on technology, AI, digital talent, and business transformation.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            @forelse ($posts as $post)
                <article class="group relative overflow-hidden rounded-2xl border border-cyan-400/20 bg-gray-900/80 shadow-2xl transition-all duration-500 hover:-translate-y-2 hover:border-cyan-400/60 hover:shadow-cyan-500/20">
                    <div class="absolute inset-0 bg-gradient-to-br from-cyan-500/5 via-blue-500/5 to-purple-600/10 opacity-0 transition-opacity duration-500 group-hover:opacity-100"></div>
                    @if ($post->featured_image)
                        <img src="{{ asset('storage/'.$post->featured_image) }}" alt="{{ $post->title }}" class="h-48 w-full object-cover opacity-90 transition-transform duration-500 group-hover:scale-105">
                    @else
                        <div class="grid h-48 place-items-center bg-gradient-to-br from-gray-900 via-blue-950 to-purple-950">
                            <img src="{{ asset('assets/prosigmaka/logo-prosigmaka-white.png') }}" alt="" class="h-12 w-auto opacity-70">
                        </div>
                    @endif
                    <div class="relative z-10 p-6">
                        <div class="mb-4 flex items-center justify-between gap-4">
                            <span class="text-xs font-bold uppercase tracking-[0.25em] text-cyan-300">{{ $post->published_at?->format('d M Y') }}</span>
                            <div class="h-2 w-2 rounded-full bg-cyan-400 shadow-[0_0_16px_rgba(34,211,238,.8)]"></div>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-black leading-tight text-white transition-colors duration-300 group-hover:text-cyan-200">
                            <a href="{{ route('blog.show', $post) }}">{{ $post->title }}</a>
                        </h3>
                        <p class="mt-4 line-clamp-3 text-sm leading-6 text-gray-300">{{ $post->excerpt }}</p>
                        <a href="{{ route('blog.show', $post) }}" class="mt-6 inline-flex items-center rounded-full border border-cyan-400/30 px-4 py-2 text-sm font-semibold text-cyan-300 transition-all duration-300 hover:border-cyan-300 hover:bg-cyan-400/10 hover:text-white">
                            Read Article
                        </a>
                    </div>
                </article>
            @empty
                <div class="md:col-span-2 lg:col-span-3 rounded-2xl border border-cyan-400/20 bg-gray-900/70 p-10 text-center text-gray-300">
                    No published articles yet.
                </div>
            @endforelse
        </div>
    </div>
</section>
