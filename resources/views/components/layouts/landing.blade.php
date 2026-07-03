<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'ProSigmaka - IT Consulting & Digital Solutions' }}</title>
    <meta name="description" content="Professional IT consulting, AI solutions, corporate training, learning platform, and head hunting services.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.net.min.js" defer></script>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/landing.js'])
</head>
<body class="bg-[#111111] font-sans text-white antialiased">
    <div id="preloader" class="fixed inset-0 z-[9999] grid place-items-center bg-[#111111] transition-opacity duration-500">
        <div class="text-center">
            <div class="mx-auto mb-6 h-24 w-24 rounded-full border-4 border-cyan-400/20 border-t-cyan-400 animate-spin"></div>
            <div id="loading-percentage" class="text-5xl font-black text-gradient">0%</div>
            <p class="mt-3 text-xs uppercase tracking-[0.3em] text-slate-400">Initializing</p>
        </div>
    </div>

    <main id="main-content" class="opacity-0 transition-opacity duration-700">
        {{ $slot }}
    </main>
</body>
</html>
