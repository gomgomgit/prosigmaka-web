@props([
    'canonical' => null,
    'description' => null,
    'image' => null,
    'modifiedTime' => null,
    'publishedTime' => null,
    'robots' => 'index, follow',
    'structuredData' => null,
    'title' => null,
    'type' => 'website',
])

@php
    $seoTitle = $title ?: config('seo.default_title');
    $seoDescription = $description ?: config('seo.default_description');
    $seoCanonical = $canonical ?: url()->current();
    $seoImage = $image ?: asset(config('seo.default_image'));
    $seoStructuredData = $structuredData ?: [
        '@context' => 'https://schema.org',
        '@graph' => [
            [
                '@type' => 'Organization',
                '@id' => route('landing').'#organization',
                'name' => config('seo.site_name'),
                'url' => route('landing'),
                'logo' => asset(config('seo.logo')),
                'sameAs' => config('seo.social_profiles'),
            ],
            [
                '@type' => 'WebSite',
                '@id' => route('landing').'#website',
                'name' => config('seo.site_name'),
                'url' => route('landing'),
                'publisher' => [
                    '@id' => route('landing').'#organization',
                ],
            ],
        ],
    ];
@endphp

<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $seoTitle }}</title>
    <meta name="description" content="{{ $seoDescription }}">
    <meta name="robots" content="{{ $robots }}">
    <link rel="canonical" href="{{ $seoCanonical }}">
    <link rel="sitemap" type="application/xml" href="{{ route('sitemap') }}">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="{{ $type }}">
    <meta property="og:site_name" content="{{ config('seo.site_name') }}">
    <meta property="og:title" content="{{ $seoTitle }}">
    <meta property="og:description" content="{{ $seoDescription }}">
    <meta property="og:url" content="{{ $seoCanonical }}">
    <meta property="og:image" content="{{ $seoImage }}">
    <meta property="og:image:alt" content="{{ $seoTitle }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seoTitle }}">
    <meta name="twitter:description" content="{{ $seoDescription }}">
    <meta name="twitter:image" content="{{ $seoImage }}">
    <meta name="twitter:image:alt" content="{{ $seoTitle }}">
    @if ($publishedTime)
        <meta property="article:published_time" content="{{ $publishedTime }}">
    @endif
    @if ($modifiedTime)
        <meta property="article:modified_time" content="{{ $modifiedTime }}">
    @endif
    <meta name="theme-color" content="#06080d">
    <link rel="icon" href="{{ asset('assets/prosigmaka/pro-orange.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-WQDEXYTZ9E"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'G-WQDEXYTZ9E');
    </script>
    <script>
        const storedTheme = localStorage.getItem('prosigmaka-theme');
        const systemTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';

        document.documentElement.dataset.theme = ['light', 'dark'].includes(storedTheme) ? storedTheme : systemTheme;
        document.querySelector('meta[name="theme-color"]').content = document.documentElement.dataset.theme === 'light' ? '#f5f7fa' : '#06080d';
        document.documentElement.classList.add('js');
    </script>
    <script type="application/ld+json">{!! json_encode($seoStructuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}</script>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/landing.js'])
</head>
<body class="min-h-screen bg-[var(--page)] font-sans text-[var(--text)] antialiased">
    <a href="#main-content" class="skip-link">Skip to main content</a>
    {{ $slot }}
</body>
</html>
