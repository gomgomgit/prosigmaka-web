<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Prosigmaka — AI-ready Digital Solutions' }}</title>
    <meta name="description" content="Prosigmaka helps enterprises build AI-ready digital solutions, strengthen technology talent, and accelerate business transformation.">
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
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/landing.js'])
</head>
<body class="min-h-screen bg-[var(--page)] font-sans text-[var(--text)] antialiased">
    <a href="#main-content" class="skip-link">Skip to main content</a>
    {{ $slot }}
</body>
</html>
