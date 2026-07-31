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
    <main id="main-content">
        {{ $slot }}
    </main>
</body>
</html>
