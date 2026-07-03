<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prosigmaka - IT Consulting & Digital Solutions</title>
    
    <!-- Google Fonts - Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Vanta.js Dependencies -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.net.min.js"></script>
    
    <!-- Custom Tailwind Config -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    },
                    colors: {
                        'dark-bg': '#1B1B1B',
                    }
                }
            }
        }
    </script>
</head>
<script>
    (function () {
        const storedTheme = localStorage.getItem('prosigmaka-theme');
        const theme = storedTheme === 'light' ? 'light' : 'dark';
        document.documentElement.dataset.theme = theme;
    })();
</script>
<body class="font-inter bg-dark-bg text-white">
<script>
    window.prosigmakaSectionIds = @json($sections->pluck('key')->values());
</script>

    <!-- Main Content -->
    <div id="main-content" class="opacity-100">
        @foreach ($sections as $section)
            @if (view()->exists($section->blade_partial))
                @include($section->blade_partial, ['posts' => $posts])
            @endif
        @endforeach

        @include('landing.sections.section-nav')
        @include('landing.sections.footer')
    </div> <!-- End of main-content -->

    @if ($sections->contains('key', 'ai-agent'))
    <!-- Floating AI Chat Bot CTA -->
    <div class="fixed bottom-6 right-6 md:bottom-6 md:right-6 z-[110] floating-ai-bot">
        <div class="group cursor-pointer flex items-center" onclick="scrollToSection('ai-agent')">
            <!-- CTA Balloon - Positioned to the left -->
            <div class="relative mr-4 animate-bounce hidden sm:block" style="animation-duration: 2s;">
                <div class="relative">
                    <!-- Balloon Background -->
                    <div class="bg-gradient-to-r from-cyan-400 to-blue-500 text-white text-sm font-bold px-4 py-2 rounded-full shadow-xl whitespace-nowrap">
                        Chat with me!
                    </div>
                    <!-- Balloon Tail (pointing to bot) -->
                    <div class="absolute top-1/2 left-full transform -translate-y-1/2">
                        <div class="w-0 h-0 border-t-6 border-b-6 border-l-8 border-t-transparent border-b-transparent border-l-cyan-400"></div>
                    </div>
                    <!-- Glow Effect -->
                    <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-blue-500 rounded-full blur-lg opacity-30 -z-10"></div>
                </div>
            </div>
            
            <!-- Main Bot Button -->
            <div class="relative">
                <!-- Multiple Outer Glow Rings -->
                <div class="absolute -inset-3 bg-gradient-to-r from-blue-400 to-purple-500 rounded-full opacity-15 animate-ping"></div>
                <div class="absolute -inset-2 bg-gradient-to-r from-purple-400 to-cyan-400 rounded-full opacity-10 animate-ping" style="animation-delay: 0.5s;"></div>
                
                <!-- Bot Container -->
                <div class="relative w-16 h-16 md:w-16 md:h-16 w-14 h-14 rounded-full flex items-center justify-center transform transition-all duration-300 group-hover:scale-125 animate-bounce" style="animation-duration: 2s;">
                    <!-- Pala Image with Enhanced Animations -->
                    <img src="{{ asset('assets/prosigmaka/photos/pala-v2.png') }}" alt="AI Assistant" class="object-contain drop-shadow-lg" style="animation-duration: 3s;" />
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Custom Styles -->
    <style>
        /* Bold & Modern Typography */
        .hero-title {
            font-family: 'Inter', sans-serif;
            font-weight: 900;
            letter-spacing: -0.02em;
            text-shadow: 0 0 20px rgba(59, 130, 246, 0.2);
            line-height: 0.9;
            word-spacing: 1.2rem;
        }
        
        /* Mobile word-spacing adjustment for hero title */
        @media (max-width: 640px) {
            .hero-title {
                word-spacing: 0.7rem;
            }
        }
        
        .section-title {
            font-family: 'Inter', sans-serif;
            font-weight: 700;
            letter-spacing: -0.01em;
            text-shadow: 0 0 10px rgba(147, 51, 234, 0.1);
        }
        
        .card-title {
            font-family: 'Inter', sans-serif;
            font-weight: 600;
            letter-spacing: -0.005em;
        }
        
        /* Typography animations */
        .text-glow {
            animation: textGlow 3s ease-in-out infinite alternate;
        }
        
        @keyframes textGlow {
            from {
                text-shadow: 0 0 20px rgba(59, 130, 246, 0.3), 0 0 30px rgba(147, 51, 234, 0.2);
            }
            to {
                text-shadow: 0 0 40px rgba(59, 130, 246, 0.6), 0 0 60px rgba(147, 51, 234, 0.4);
            }
        }
        
        .text-bold-shadow {
            text-shadow: 
                2px 2px 0px rgba(0, 0, 0, 1),
                4px 4px 0px rgba(0, 0, 0, 0.8),
                6px 6px 0px rgba(0, 0, 0, 0.6),
                0px 0px 10px rgba(0, 0, 0, 0.9),
                0px 0px 20px rgba(0, 0, 0, 0.7),
                0px 0px 30px rgba(0, 0, 0, 0.5);
        }
        
        /* Gradient text effects */
        .text-gradient-bold {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-shadow: none;
        }
        
        .text-gradient-fire {
            background: linear-gradient(135deg, #ff6b6b 0%, #ffa500 50%, #ff1744 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            filter: drop-shadow(2px 2px 0px rgba(0, 0, 0, 0.9)) 
                    drop-shadow(4px 4px 0px rgba(0, 0, 0, 0.7))
                    drop-shadow(0px 0px 10px rgba(0, 0, 0, 0.8))
                    drop-shadow(0px 0px 20px rgba(0, 0, 0, 0.6));
        }
        
        /* Hero gradient text shadow */
        .hero-gradient-shadow {
            filter: drop-shadow(2px 2px 0px rgba(0, 0, 0, 0.9)) 
                    drop-shadow(4px 4px 0px rgba(0, 0, 0, 0.7))
                    drop-shadow(0px 0px 10px rgba(0, 0, 0, 0.8))
                    drop-shadow(0px 0px 20px rgba(0, 0, 0, 0.6));
        }
        
        /* Hero subtitle shadow */
        .hero-subtitle-shadow {
            text-shadow: 
                1px 1px 0px rgba(0, 0, 0, 0.9),
                2px 2px 0px rgba(0, 0, 0, 0.7),
                3px 3px 0px rgba(0, 0, 0, 0.5),
                0px 0px 8px rgba(0, 0, 0, 0.8),
                0px 0px 15px rgba(0, 0, 0, 0.6);
        }
        
        /* Custom font weights and sizes for better hierarchy */
        .text-ultra-bold {
            font-weight: 900;
            font-stretch: expanded;
        }
        
        .text-mega {
            font-size: clamp(1rem, 6vw, 4rem);
            line-height: 0.85;
        }
        
        /* Futuristic Preloader Animations */
        .glow-text {
            text-shadow: 0 0 20px rgba(0, 245, 255, 0.5), 0 0 40px rgba(0, 128, 255, 0.3), 0 0 60px rgba(139, 92, 246, 0.2);
            animation: textGlowPulse 2s ease-in-out infinite;
        }
        
        @keyframes textGlowPulse {
            0%, 100% {
                text-shadow: 0 0 20px rgba(0, 245, 255, 0.5), 0 0 40px rgba(0, 128, 255, 0.3), 0 0 60px rgba(139, 92, 246, 0.2);
            }
            50% {
                text-shadow: 0 0 30px rgba(0, 245, 255, 0.8), 0 0 60px rgba(0, 128, 255, 0.5), 0 0 90px rgba(139, 92, 246, 0.4);
            }
        }
        
        /* Grid Pattern */
        .grid-pattern {
            background-image: 
                linear-gradient(rgba(0, 245, 255, 0.1) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 245, 255, 0.1) 1px, transparent 1px);
            background-size: 50px 50px;
            animation: gridMove 20s linear infinite;
        }
        
        @keyframes gridMove {
            0% { transform: translate(0, 0); }
            100% { transform: translate(50px, 50px); }
        }
        
        /* Floating Particles */
        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: linear-gradient(45deg, #00f5ff, #8b5cf6);
            border-radius: 50%;
            animation: floatParticle 6s ease-in-out infinite;
            box-shadow: 0 0 10px rgba(0, 245, 255, 0.6);
        }
        
        .particle-1 { top: 20%; left: 10%; animation-delay: 0s; animation-duration: 8s; }
        .particle-2 { top: 60%; left: 80%; animation-delay: 1s; animation-duration: 7s; }
        .particle-3 { top: 80%; left: 20%; animation-delay: 2s; animation-duration: 9s; }
        .particle-4 { top: 30%; left: 70%; animation-delay: 3s; animation-duration: 6s; }
        .particle-5 { top: 10%; right: 15%; animation-delay: 4s; animation-duration: 8s; }
        .particle-6 { bottom: 20%; left: 60%; animation-delay: 5s; animation-duration: 7s; }
        
        @keyframes floatParticle {
            0%, 100% {
                transform: translateY(0px) translateX(0px) scale(1);
                opacity: 0.7;
            }
            25% {
                transform: translateY(-20px) translateX(10px) scale(1.2);
                opacity: 1;
            }
            50% {
                transform: translateY(-10px) translateX(-15px) scale(0.8);
                opacity: 0.5;
            }
            75% {
                transform: translateY(15px) translateX(5px) scale(1.1);
                opacity: 0.9;
            }
        }
        
        /* Scanning Lines */
        .scan-line {
            position: absolute;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(0, 245, 255, 0.8), transparent);
            animation: scanLine 4s ease-in-out infinite;
        }
        
        .scan-line-1 {
            top: 30%;
            width: 100%;
            animation-delay: 0s;
        }
        
        .scan-line-2 {
            top: 70%;
            width: 100%;
            animation-delay: 2s;
        }
        
        @keyframes scanLine {
            0%, 100% {
                opacity: 0;
                transform: translateX(-100%);
            }
            50% {
                opacity: 1;
                transform: translateX(100%);
            }
        }
        
        /* Letter animation for LOADING text */
        @keyframes letterPulse {
            0%, 100% {
                opacity: 0.3;
                transform: scale(1);
            }
            50% {
                opacity: 1;
                transform: scale(1.1);
            }
        }
        
        .animate-pulse {
            animation: letterPulse 1.5s ease-in-out infinite;
        }
        
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fadeInDown {
            animation: fadeInDown 0.6s ease-out;
        }
        
        /* Main content transition during preload */
        #main-content {
            transition: opacity 0.5s ease-in-out;
        }
        
        #main-content.opacity-0 {
            opacity: 0;
        }
        
        #main-content.opacity-50 {
            opacity: 0.5;
        }
        
        #main-content.opacity-100 {
            opacity: 1;
        }
        
        /* Ensure consistent background from start */
        body {
            background-color: #1B1B1B !important;
        }
        
        /* Add bottom padding on mobile/tablet for bottom navigation */
        @media (max-width: 1024px) {
            body {
                padding-bottom: 6rem;
            }
        }
        
        /* Custom animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes matrixRain {
            0% { transform: translateY(-100vh); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(100vh); opacity: 0; }
        }
        
        @keyframes lightRay {
            0%, 100% { opacity: 0.1; transform: scaleY(1); }
            50% { opacity: 0.3; transform: scaleY(1.5); }
        }
        
        @keyframes typingCursor {
            0%, 50% { opacity: 1; }
            51%, 100% { opacity: 0; }
        }
        
        @keyframes counterUp {
            from { transform: translateY(20px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        @keyframes spin-slow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        @keyframes spin-reverse {
            from { transform: rotate(360deg); }
            to { transform: rotate(0deg); }
        }
        
        @keyframes float-slow {
            0%, 100% { transform: translateY(0px) scale(1); }
            50% { transform: translateY(-10px) scale(1.05); }
        }

        .services-row {
            display: flex;
            justify-content: center;
            gap: 28px;
            margin-bottom: 28px;
        }
        
        .services-row:last-child {
            margin-bottom: 0;
        }
        
        .service-card-large {
            position: relative;
            width: 200px;
            height: 200px;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 20px;
            overflow: hidden;
        }
        
        .service-card-large:hover {
            transform: scale(1.08) translateY(-8px);
            z-index: 10;
        }
        
        .card-content-large {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 24px 16px;
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
            border-radius: 20px;
        }
        
        .card-bg-icon {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 90px;
            height: 90px;
            opacity: 0.5;
            z-index: 1;
            color: white;
        }
        
        .card-bg-icon svg {
            width: 100%;
            height: 100%;
        }
        
        .card-title-large {
            font-size: 18px;
            font-weight: bold;
            color: white;
            text-transform: uppercase;
            line-height: 1.1;
            z-index: 2;
            position: relative;
            margin-bottom: 10px;
            letter-spacing: 0.5px;
        }
        
        .card-desc-large {
            font-size: 14px;
            color: rgba(255, 255, 255, 0.8);
            line-height: 1.4;
            z-index: 2;
            position: relative;
            text-align: center;
            font-weight: 400;
        }
        
        /* Responsive Design for Services Section */
        @media (max-width: 1024px) {
            .services-grid-large {
                max-width: 520px;
            }
            
            .service-card-large {
                width: 160px;
                height: 160px;
            }
            
            .services-row {
                gap: 20px;
            }
        }
        
        @media (max-width: 768px) {
            .services-grid-large {
                max-width: 100%;
            }
            
            .service-card-large {
                width: 140px;
                height: 140px;
            }
            
            .services-row {
                gap: 16px;
                margin-bottom: 16px;
            }
            
            .card-title-large {
                font-size: 12px;
                margin-bottom: 8px;
            }
            
            .card-desc-large {
                font-size: 10px;
            }
        }
        
        @media (max-width: 640px) {
            .services-grid-large {
                transform: scale(0.9);
            }
            
            .service-card-large {
                width: 120px;
                height: 120px;
            }
            
            .services-row {
                gap: 12px;
            }
            
            .card-content-large {
                padding: 16px 12px;
            }
            
            .card-title-large {
                font-size: 11px;
                margin-bottom: 6px;
            }
            
            .card-desc-large {
                font-size: 9px;
                line-height: 1.3;
            }
            
            .card-bg-icon {
                width: 70px;
                height: 70px;
            }
        }
        
        /* Individual card colors and hover effects - Agent Avatar Style */
        
        /* Professional Services - Cyan to Blue like Agent Tech */
        .professional-card {
            position: relative;
        }
        
        .professional-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(6, 182, 212, 0.4) 0%, rgba(59, 130, 246, 0.4) 100%);
            border-radius: 20px;
            filter: blur(12px);
            opacity: 0;
            transition: opacity 0.5s ease;
            z-index: 0;
        }
        
        .professional-card:hover::before {
            opacity: 0.6;
        }
        
        .professional-card .card-content-large {
            background: rgba(17, 24, 39, 0.8);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(6, 182, 212, 0.3);
            position: relative;
            z-index: 1;
        }
        
        .professional-card:hover .card-content-large {
            border-color: rgba(6, 182, 212, 0.8);
            box-shadow: 0 0 30px rgba(6, 182, 212, 0.4);
            background: rgba(17, 24, 39, 0.9);
        }
        
        /* Head Hunting - Purple to Pink like Agent Business */
        .headhunting-card {
            position: relative;
        }
        
        .headhunting-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(147, 51, 234, 0.4) 0%, rgba(236, 72, 153, 0.4) 100%);
            border-radius: 20px;
            filter: blur(12px);
            opacity: 0;
            transition: opacity 0.5s ease;
            z-index: 0;
        }
        
        .headhunting-card:hover::before {
            opacity: 0.6;
        }
        
        .headhunting-card .card-content-large {
            background: rgba(17, 24, 39, 0.8);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(147, 51, 234, 0.3);
            position: relative;
            z-index: 1;
        }
        
        .headhunting-card:hover .card-content-large {
            border-color: rgba(147, 51, 234, 0.8);
            box-shadow: 0 0 30px rgba(147, 51, 234, 0.4);
            background: rgba(17, 24, 39, 0.9);
        }
        
        
        /* AI Solutions - Orange to Red like Agent AI */
        .ai-card {
            position: relative;
        }
        
        .ai-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(249, 115, 22, 0.4) 0%, rgba(239, 68, 68, 0.4) 100%);
            border-radius: 20px;
            filter: blur(12px);
            opacity: 0;
            transition: opacity 0.5s ease;
            z-index: 0;
        }
        
        .ai-card:hover::before {
            opacity: 0.6;
        }
        
        .ai-card .card-content-large {
            background: rgba(17, 24, 39, 0.8);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(249, 115, 22, 0.3);
            position: relative;
            z-index: 1;
        }
        
        .ai-card:hover .card-content-large {
            border-color: rgba(249, 115, 22, 0.8);
            box-shadow: 0 0 30px rgba(249, 115, 22, 0.4);
            background: rgba(17, 24, 39, 0.9);
        }
        
        /* Learning Platform - Indigo to Blue */
        .lxp-card {
            position: relative;
        }
        
        .lxp-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.4) 0%, rgba(79, 70, 229, 0.4) 100%);
            border-radius: 20px;
            filter: blur(12px);
            opacity: 0;
            transition: opacity 0.5s ease;
            z-index: 0;
        }
        
        .lxp-card:hover::before {
            opacity: 0.6;
        }
        
        .lxp-card .card-content-large {
            background: rgba(17, 24, 39, 0.8);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(99, 102, 241, 0.3);
            position: relative;
            z-index: 1;
        }
        
        .lxp-card:hover .card-content-large {
            border-color: rgba(99, 102, 241, 0.8);
            box-shadow: 0 0 30px rgba(99, 102, 241, 0.4);
            background: rgba(17, 24, 39, 0.9);
        }
        
        /* Corporate Training - Yellow to Amber */
        .training-card {
            position: relative;
        }
        
        .training-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.4) 0%, rgba(217, 119, 6, 0.4) 100%);
            border-radius: 20px;
            filter: blur(12px);
            opacity: 0;
            transition: opacity 0.5s ease;
            z-index: 0;
        }
        
        .training-card:hover::before {
            opacity: 0.6;
        }
        
        .training-card .card-content-large {
            background: rgba(17, 24, 39, 0.8);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(245, 158, 11, 0.3);
            position: relative;
            z-index: 1;
        }
        
        .training-card:hover .card-content-large {
            border-color: rgba(245, 158, 11, 0.8);
            box-shadow: 0 0 30px rgba(245, 158, 11, 0.4);
            background: rgba(17, 24, 39, 0.9);
        }

        /* Service Details Panel */
        .service-details-panel {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }
        
        .service-details-panel.active {
            opacity: 1;
            visibility: visible;
        }
        
        .details-content {
            background: linear-gradient(135deg, rgba(17, 24, 39, 0.95), rgba(55, 65, 81, 0.95));
            border: 1px solid rgba(75, 85, 99, 0.3);
            border-radius: 20px;
            padding: 40px;
            max-width: 600px;
            width: 90%;
            max-height: 80vh;
            overflow-y: auto;
            position: relative;
            transform: scale(0.8);
            transition: transform 0.3s ease;
        }
        
        .service-details-panel.active .details-content {
            transform: scale(1);
        }
        
        .close-details {
            position: absolute;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        
        .close-details:hover {
            background: rgba(239, 68, 68, 0.2);
            color: #EF4444;
        }
        
        /* Hexagon Glow Effects */
        .service-hex[data-service="professional"] .hex-content:hover {
            box-shadow: 0 0 30px rgba(59, 130, 246, 0.5);
        }
        
        .service-hex[data-service="headhunting"] .hex-content:hover {
            box-shadow: 0 0 30px rgba(168, 85, 247, 0.5);
        }
        
        .service-hex[data-service="ai"] .hex-content:hover {
            box-shadow: 0 0 30px rgba(249, 115, 22, 0.5);
        }
        
        .service-hex[data-service="lxp"] .hex-content:hover {
            box-shadow: 0 0 30px rgba(99, 102, 241, 0.5);
        }
        
        .service-hex[data-service="training"] .hex-content:hover {
            box-shadow: 0 0 30px rgba(245, 158, 11, 0.5);
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .hexagon-grid {
                transform: scale(0.8);
            }
            
            .hex-row-middle {
                transform: translateX(60px);
            }
            
            .hexagon-container {
                width: 150px;
                height: 130px;
            }
            
            .hex-title {
                font-size: 12px;
            }
            
            .hex-desc {
                font-size: 10px;
            }
        }
        
        /* Services Animation */
        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes pulseGlow {
            0%, 100% {
                box-shadow: 0 0 5px rgba(59, 130, 246, 0.5);
            }
            50% {
                box-shadow: 0 0 20px rgba(59, 130, 246, 0.8), 0 0 30px rgba(147, 51, 234, 0.6);
            }
        }
        
        .service-card {
            animation: slideInRight 0.6s ease-out;
            max-width: 20vw;
        }
        
        .service-card:nth-child(1) { animation-delay: 0.1s; }
        .service-card:nth-child(2) { animation-delay: 0.2s; }
        .service-card:nth-child(3) { animation-delay: 0.3s; }
        .service-card:nth-child(4) { animation-delay: 0.4s; }
        .service-card:nth-child(5) { animation-delay: 0.5s; }
        .service-card:nth-child(6) { animation-delay: 0.6s; }
        
        .service-card:hover {
            animation: pulseGlow 2s infinite;
        }

        /* AI Agent Animations */
        @keyframes neuralPulse {
            0%, 100% { 
                opacity: 0.1; 
                transform: scale(1);
            }
            50% { 
                opacity: 0.3; 
                transform: scale(1.05);
            }
        }

        .agent-card {
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            border-radius: 1rem;
            padding: 0.5rem; /* Space for glow effect */
            overflow: hidden; /* Ensure shimmer effect stays inside */
            width: 100%;
            max-width: 320px;
        }
        
        @media (min-width: 640px) {
            .agent-card {
                max-width: none;
            }
        }

        .agent-card:hover {
            transform: translateY(-8px) scale(1.03);
            filter: brightness(1.1);
        }

        /* Glow effect positioning fix */
        .agent-card .absolute.inset-2 {
            border-radius: 1rem;
            z-index: 0;
        }

        /* Card content positioning */
        .agent-card .relative.bg-gray-900\/80 {
            z-index: 1;
            border-radius: 1rem;
            overflow: hidden; /* Ensure content doesn't overflow */
        }
        
        /* Avatar glow effect */
        .agent-card .bg-gradient-to-br.rounded-full::after {
            content: '';
            position: absolute;
            inset: -6px;
            background: inherit;
            border-radius: inherit;
            filter: blur(12px);
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: -1;
        }
        
        .agent-card:hover .bg-gradient-to-br.rounded-full::after {
            opacity: 0.7;
        }

        .agent-card::before {
            content: '';
            position: absolute;
            inset: 0.5rem; /* Match the padding to stay within card bounds */
            background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.1) 50%, transparent 70%);
            opacity: 0;
            transition: opacity 0.5s ease;
            pointer-events: none;
            border-radius: 1rem;
            z-index: 2; /* Above card content but below text */
        }



        /* Floating Animation for AI Elements */
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-10px) rotate(2deg); }
            66% { transform: translateY(5px) rotate(-1deg); }
        }

        @keyframes iconFloat {
            0%, 100% { 
                transform: translateY(0px) scale(1); 
            }
            50% { 
                transform: translateY(-8px) scale(1.02); 
            }
        }

        .agent-card:nth-child(1) { animation: float 6s ease-in-out infinite; }
        .agent-card:nth-child(2) { animation: float 6s ease-in-out infinite 1s; }
        .agent-card:nth-child(3) { animation: float 6s ease-in-out infinite 2s; }
        .agent-card:nth-child(4) { animation: float 6s ease-in-out infinite 3s; }

        /* Gradient Shift Animation for Dramatic Effect */
        @keyframes gradientShift {
            0%, 100% { 
                background-position: 0% 50%; 
            }
            50% { 
                background-position: 100% 50%; 
            }
        }

        /* Pulse Glow for Featured Elements */
        @keyframes pulseGlowDramatic {
            0%, 100% { 
                box-shadow: 0 0 20px rgba(168, 85, 247, 0.3), inset 0 0 20px rgba(168, 85, 247, 0.1);
            }
            50% { 
                box-shadow: 0 0 60px rgba(168, 85, 247, 0.6), inset 0 0 30px rgba(236, 72, 153, 0.2);
            }
        }
        
        /* Floating Orbs Animation */
        @keyframes floatSlow {
            0%, 100% {
                transform: translateY(0) translateX(0) rotate(0deg);
            }
            25% {
                transform: translateY(-20px) translateX(10px) rotate(90deg);
            }
            50% {
                transform: translateY(-40px) translateX(-10px) rotate(180deg);
            }
            75% {
                transform: translateY(-20px) translateX(-15px) rotate(270deg);
            }
        }
        
        @keyframes floatMedium {
            0%, 100% {
                transform: translateY(0) translateX(0) rotate(0deg);
            }
            33% {
                transform: translateY(-30px) translateX(-20px) rotate(120deg);
            }
            66% {
                transform: translateY(-15px) translateX(15px) rotate(240deg);
            }
        }
        
        @keyframes floatFast {
            0%, 100% {
                transform: translateY(0) translateX(0) rotate(0deg);
            }
            50% {
                transform: translateY(-25px) translateX(20px) rotate(180deg);
            }
        }
        
        .animate-float-slow {
            animation: floatSlow 20s ease-in-out infinite;
        }
        
        .animate-float-medium {
            animation: floatMedium 15s ease-in-out infinite;
        }
        
        .animate-float-fast {
            animation: floatFast 10s ease-in-out infinite;
        }
        
        /* Enhanced Case Study Scroll Styles */
        .scrollbar-hide {
            -ms-overflow-style: none;  /* Internet Explorer 10+ */
            scrollbar-width: none;  /* Firefox */
        }
        
        .scrollbar-hide::-webkit-scrollbar {
            display: none;  /* Safari and Chrome */
        }
        
        /* Custom scrollbar for modern browsers (optional fallback) */
        .scroll-enhanced::-webkit-scrollbar {
            height: 8px;
        }
        
        .scroll-enhanced::-webkit-scrollbar-track {
            background: rgba(55, 65, 81, 0.3);
            border-radius: 4px;
        }
        
        .scroll-enhanced::-webkit-scrollbar-thumb {
            background: linear-gradient(90deg, #06b6d4, #3b82f6, #8b5cf6);
            border-radius: 4px;
        }
        
        .scroll-enhanced::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(90deg, #0891b2, #2563eb, #7c3aed);
        }
        
        /* Timeline Progress Animation */
        @keyframes timelineGlow {
            0%, 100% {
                opacity: 0.3;
                filter: blur(0px);
            }
            50% {
                opacity: 0.6;
                filter: blur(1px);
            }
        }
        
        .timeline-progress {
            animation: timelineGlow 3s ease-in-out infinite;
        }
        
        /* Scroll Hint Animations */
        @keyframes scrollHintFloat {
            0%, 100% {
                transform: translateY(-50%) translateX(0px);
            }
            50% {
                transform: translateY(-50%) translateX(5px);
            }
        }
        
        .scroll-hint-right {
            animation: scrollHintFloat 2s ease-in-out infinite;
        }
        
        @keyframes scrollHintFloatLeft {
            0%, 100% {
                transform: translateY(-50%) translateX(0px);
            }
            50% {
                transform: translateY(-50%) translateX(-5px);
            }
        }
        
        .scroll-hint-left {
            animation: scrollHintFloatLeft 2s ease-in-out infinite;
        }
        
        /* Enhanced Case Study Card Hover Effects */
        .case-study-card-enhanced {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .case-study-card-enhanced:hover {
            filter: brightness(1.1);
        }
        
        /* Gradient fade enhancements */
        .gradient-fade-left {
            background: linear-gradient(90deg, 
                rgba(17, 24, 39, 1) 0%, 
                rgba(17, 24, 39, 0.9) 20%, 
                rgba(17, 24, 39, 0.5) 60%, 
                transparent 100%
            );
        }
        
        .gradient-fade-right {
            background: linear-gradient(270deg, 
                rgba(17, 24, 39, 1) 0%, 
                rgba(17, 24, 39, 0.9) 20%, 
                rgba(17, 24, 39, 0.5) 60%, 
                transparent 100%
            );
        }
        
        /* Smooth scroll behavior */
        .scroll-smooth {
            scroll-behavior: smooth;
        }
        
        /* Case Study Cards Animations */
        @keyframes caseStudyFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
        }
        
        .case-study-card {
            animation: caseStudyFloat 4s ease-in-out infinite;
            transition: all 0.3s ease;
        }
        
        .case-study-card:nth-child(1) { animation-delay: 0s; }
        .case-study-card:nth-child(2) { animation-delay: 0.5s; }
        .case-study-card:nth-child(3) { animation-delay: 1s; }
        .case-study-card:nth-child(4) { animation-delay: 1.5s; }
        .case-study-card:nth-child(5) { animation-delay: 2s; }
        
        /* Case Study hover effects - consistent with other sections */
        .case-study-card:hover {
            transform: translateY(-10px) scale(1.02);
        }
        
        /* Case Study Responsive Design with Fallbacks */
        @media (max-width: 640px) {
            /* Mobile case study cards */
            .case-study-card, .case-study-card-enhanced > div {
                margin-bottom: 1.5rem;
                min-height: 280px;
            }
            
            /* Case study title responsive */
            .case-study-title {
                font-size: 1.125rem !important;
                line-height: 1.75rem !important;
                margin-bottom: 0.5rem !important;
            }
            
            /* Case study description responsive */
            .case-study-description {
                font-size: 0.875rem !important;
                line-height: 1.25rem !important;
            }
            
            /* Case study logo responsive */
            .case-study-logo {
                width: 4rem !important;
                height: 4rem !important;
            }
            
            /* Case study navigation buttons - mobile */
            .success-nav-btn > div {
                width: 2.5rem !important;
                height: 2.5rem !important;
            }
            
            /* Case study container mobile spacing */
            .case-study-container, .success-stories-carousel {
                padding-left: 1rem !important;
                padding-right: 1rem !important;
                gap: 1.5rem !important;
            }
            
            /* Mobile text size optimizations */
            .case-study-card-enhanced h4, .case-study-card-enhanced .case-study-title {
                font-size: 1.125rem !important;
                line-height: 1.5rem !important;
            }
            
            .case-study-card-enhanced h5 {
                font-size: 1rem !important;
                line-height: 1.375rem !important;
            }
            
            .case-study-card-enhanced .grid span {
                font-size: 0.8125rem !important;
                line-height: 1.125rem !important;
            }
        }
        
        @media (min-width: 641px) and (max-width: 1024px) {
            /* Tablet case study cards */
            .case-study-card, .case-study-card-enhanced > div {
                min-height: 300px;
            }
            
            /* Case study title tablet */
            .case-study-title {
                font-size: 1.25rem !important;
                line-height: 1.75rem !important;
            }
            
            /* Case study logo tablet */
            .case-study-logo {
                width: 4.5rem !important;
                height: 4.5rem !important;
            }
            
            /* Case study navigation buttons - tablet */
            .success-nav-btn > div {
                width: 3rem !important;
                height: 3rem !important;
            }
        }
        
        @media (min-width: 1025px) {
            /* Desktop case study cards */
            .case-study-card, .case-study-card-enhanced > div {
                min-height: 325px;
            }
            
            /* Case study title desktop */
            .case-study-title {
                font-size: 1.5rem !important;
                line-height: 2rem !important;
            }
            
            /* Case study logo desktop */
            .case-study-logo {
                width: 5rem !important;
                height: 5rem !important;
            }
            
            /* Case study navigation buttons - desktop */
            .success-nav-btn > div {
                width: 3.5rem !important;
                height: 3.5rem !important;
            }
        }

        /* Timeline responsive design */
        @media (max-width: 768px) {
            .case-study-timeline {
                padding-left: 2rem;
            }
            
            .timeline-item {
                flex-direction: column !important;
                align-items: flex-start !important;
            }
            
            .timeline-item .timeline-content {
                width: 100% !important;
                padding: 0 !important;
                margin-left: 2rem;
            }
            
            .timeline-item .timeline-node {
                left: 0 !important;
                transform: translateX(0) !important;
            }
            
            .timeline-item .timeline-line {
                left: 0.75rem !important;
            }
        }
        
        /* Enhanced Case Study Responsive Design - Clean & Simple */
        @media (max-width: 640px) {
            /* Mobile optimizations */
            #case-study .section-title {
                font-size: 2.5rem !important;
                line-height: 1.1 !important;
            }
            
            #case-study .font-inter {
                font-size: 1rem !important;
                line-height: 1.5 !important;
                padding: 0 1rem;
            }
            
            .scroll-hint-left,
            .scroll-hint-right {
                display: none !important;
            }
            
            .case-study-card {
                width: 280px !important;
                min-width: 280px !important;
            }
        }
        
        @media (min-width: 641px) and (max-width: 768px) {
            /* Tablet optimizations */
            #case-study .section-title {
                font-size: 3.5rem !important;
            }
            
            .case-study-card {
                width: 300px !important;
            }
            
            .scroll-hint-left {
                left: 0.5rem !important;
            }
            
            .scroll-hint-right {
                right: 0.5rem !important;
            }
        }
        
        @media (min-width: 769px) {
            /* Desktop - everything works as designed */
            .case-study-card {
                width: 320px;
            }
        }
        
        /* Touch device optimizations */
        @media (hover: none) and (pointer: coarse) {
            /* Remove hover effects on touch devices */
            .case-study-card:hover,
            .case-study-card-enhanced:hover {
                transform: none !important;
                filter: none !important;
            }
            
            /* Make cards slightly larger for touch interaction */
            .relative.bg-gradient-to-br {
                padding: 1.5rem !important;
            }
            
            /* Improve button sizing for touch */
            .relative.bg-gradient-to-br button {
                padding: 0.75rem !important;
                font-size: 0.875rem !important;
            }
        }
        
        /* High DPI/Retina display optimizations */
        @media (-webkit-min-device-pixel-ratio: 2), (min-resolution: 192dpi) {
            /* Sharper borders and shadows - Only for case study cards, exclude agent avatars */
            #case-study .case-study-card .relative.bg-gradient-to-br {
                border-width: 0.5px;
            }
            
            /* Enhanced glow effects */
            .timeline-progress {
                filter: blur(0.5px);
            }
        }
        
        /* Landscape orientation optimizations */
        @media screen and (max-height: 500px) and (orientation: landscape) {
            /* Compact layout for landscape phones */
            #case-study .fullpage-section {
                min-height: auto;
                padding: 2rem 0;
            }
            
            .section-title {
                font-size: 2.5rem !important;
                margin-bottom: 1rem !important;
            }
            
            #case-study .font-inter.text-2xl {
                font-size: 1rem !important;
                margin-bottom: 2rem !important;
            }
            
            #case-study .case-study-card .relative.bg-gradient-to-br {
                height: 18rem !important;
                padding: 1rem !important;
            }
        }
        
        /* Print styles */
        @media print {
            #case-study {
                break-inside: avoid;
            }
            
            #case-study .overflow-x-auto {
                overflow: visible !important;
            }
            
            #case-study .flex {
                flex-wrap: wrap !important;
            }
            
            .scroll-hint-left,
            .scroll-hint-right {
                display: none !important;
            }
        }
        
        /* Circuit Animation */
        @keyframes circuitMove {
            0% {
                background-position: 0% 0%, 0% 0%, 0% 0%;
            }
            100% {
                background-position: 100% 100%, 100% 100%, 100% 100%;
            }
        }
        
        /* Smooth scrolling & Snap - DISABLED */
        html {
            scroll-behavior: smooth;
            /* scroll-snap-type: y mandatory; */
            overflow-x: hidden;
        }
        
        body {
            /* scroll-snap-type: y mandatory; */
            overflow-y: scroll;
            overflow-x: hidden;
        }

        /* Section layout */
        .fullpage-section {
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            padding: 2rem 0;
        }
        
        /* Hero section specific styling */
        #home.fullpage-section {
            min-height: 100vh;
            height: 100vh;
            padding: 0;
            display: flex;
            flex-direction: column;
        }
        
        /* Hero Robot Image Styling */
        .hero-robot-img {
            transform-origin: center center;
            transition: all 0.3s ease;
        }
        
        /* Hero Content Responsive Layout */
        @media (max-width: 640px) {
            .hero-robot-img {
                display: block !important;
                opacity: 0.9;
                transform: translateX(30%);
            }
            
            .text-left.space-y-8 {
                max-width: 85% !important;
            }
        }

        /* Tablet Layout */
        @media (min-width: 641px) and (max-width: 1023px) {
            .hero-robot-img {
                transform: translateX(30%);
            }
        }
        
        /* Robot image container centering */
        .hero-robot-img {
            margin: auto 0;
            display: block;
        }
        
        /* Ensure hero content doesn't overlap */
        .hero-content-container {
            position: relative;
            z-index: 30;
        }
        
        /* Enhanced Hero Animations */
        @keyframes floatUp {
            0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.6; }
            25% { transform: translateY(-20px) rotate(90deg); opacity: 1; }
            50% { transform: translateY(-10px) rotate(180deg); opacity: 0.8; }
            75% { transform: translateY(-30px) rotate(270deg); opacity: 1; }
        }
        
        @keyframes slide-infinite {
            0% { transform: translateX(0); }
            100% { 
                /* Move exactly half of total width for seamless loop */
                transform: translateX(calc(-1 * ((18rem * 4) + (0.75rem * 3) + 0.5rem))); 
            }
        }
        
        /* Responsive Animation Keyframes */
        @media (min-width: 640px) {
            @keyframes slide-infinite {
                0% { transform: translateX(0); }
                100% { 
                    transform: translateX(calc(-1 * ((20rem * 4) + (1rem * 3) + 0.75rem))); 
                }
            }
        }
        
        @media (min-width: 1024px) {
            @keyframes slide-infinite {
                0% { transform: translateX(0); }
                100% { 
                    transform: translateX(calc(-1 * ((24rem * 4) + (1.5rem * 3)))); 
                }
            }
        }
        
        @media (min-width: 1280px) {
            @keyframes slide-infinite {
                0% { transform: translateX(0); }
                100% { 
                    transform: translateX(calc(-1 * ((24rem * 4) + (2rem * 3)))); 
                }
            }
        }
        
        .testimonials-carousel:hover {
            animation-play-state: paused;
        }
        
        /* Seamless Loop Optimization */
        .testimonials-carousel {
            transform-style: preserve-3d;
            backface-visibility: hidden;
            will-change: transform;
            
            /* Precise Width Calculations */
            /* Mobile: w-72 (18rem) + space-x-3 (0.75rem gap) */
            width: calc((18rem * 8) + (0.75rem * 7) + 1rem); /* 4 cards × 2 sets + gaps + padding */
        }
        
        /* Tablet Breakpoint */
        @media (min-width: 640px) {
            .testimonials-carousel {
                /* Tablet: w-80 (20rem) + space-x-4 (1rem gap) */
                width: calc((20rem * 8) + (1rem * 7) + 1.5rem); /* 4 cards × 2 sets + gaps + padding */
            }
        }
        
        /* Large Desktop Breakpoint */
        @media (min-width: 1024px) {
            .testimonials-carousel {
                /* Desktop: w-96 (24rem) + space-x-6 (1.5rem gap) */
                width: calc((24rem * 8) + (1.5rem * 7) + 0rem); /* 4 cards × 2 sets + gaps + no padding on lg */
            }
        }
        
        /* Extra Large Desktop Breakpoint */
        @media (min-width: 1280px) {
            .testimonials-carousel {
                /* XL Desktop: w-96 (24rem) + space-x-8 (2rem gap) */
                width: calc((24rem * 8) + (2rem * 7) + 0rem); /* 4 cards × 2 sets + gaps + no padding on xl */
            }
        }
        
        /* Ensure consistent spacing across all breakpoints */
        .testimonial-card {
            transform: translateZ(0);
            backface-visibility: hidden;
        }
        
        /* Performance & Accessibility Enhancements */
        
        /* Mobile Menu Enhancements */
        #mobile-menu {
            transform: translateY(-10px);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            max-height: 0;
            overflow: hidden;
        }
        
        #mobile-menu:not(.hidden) {
            transform: translateY(0);
            opacity: 1;
            visibility: visible;
            max-height: 500px;
        }
        
        .mobile-menu-item {
            transform: translateX(-20px);
            opacity: 0;
            animation: slideInLeft 0.3s ease-out forwards;
        }
        
        .mobile-menu-item:nth-child(1) { animation-delay: 0.1s; }
        .mobile-menu-item:nth-child(2) { animation-delay: 0.15s; }
        .mobile-menu-item:nth-child(3) { animation-delay: 0.2s; }
        .mobile-menu-item:nth-child(4) { animation-delay: 0.25s; }
        .mobile-menu-item:nth-child(5) { animation-delay: 0.3s; }
        
        @keyframes slideInLeft {
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
        
        /* Mobile Menu Background Blur Effect */
        #mobile-menu > div {
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 
                0 20px 25px -5px rgba(0, 0, 0, 0.3),
                0 10px 10px -5px rgba(0, 0, 0, 0.2),
                0 0 0 1px rgba(6, 182, 212, 0.1);
        }
        
        /* Mobile Menu Item Hover Effects */
        .mobile-menu-item:hover {
            transform: translateX(8px);
        }
        
        .mobile-menu-item:active {
            transform: translateX(4px) scale(0.98);
        }
        
        /* Navigation Container Positioning Fix */
        nav#top-navbar {
            position: relative;
            z-index: 40;
        }
        
        /* Lazy Loading Images */
        .lazy-load {
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .lazy-load.loaded {
            opacity: 1;
        }
        
        /* Skip Link for Screen Readers */
        .sr-only {
            position: absolute !important;
            width: 1px !important;
            height: 1px !important;
            padding: 0 !important;
            margin: -1px !important;
            overflow: hidden !important;
            clip: rect(0, 0, 0, 0) !important;
            white-space: nowrap !important;
            border: 0 !important;
        }
        
        .focus\:not-sr-only:focus {
            position: static !important;
            width: auto !important;
            height: auto !important;
            padding: 0.5rem 1rem !important;
            margin: 0 !important;
            overflow: visible !important;
            clip: auto !important;
            white-space: normal !important;
        }
        
        /* Enhanced Focus States */
        .focus\:ring-2:focus {
            outline: 2px solid transparent;
            outline-offset: 2px;
            box-shadow: 0 0 0 2px var(--tw-ring-offset-color), 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
        }
        
        /* High Contrast Mode Support */
        @media (prefers-contrast: high) {
            .text-gray-200 {
                color: #ffffff !important;
            }
            
            .text-gray-300 {
                color: #ffffff !important;
            }
            
            .border-gray-700 {
                border-color: #ffffff !important;
            }
        }
        
        /* Reduced Motion Support */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
            
            .animate-pulse,
            .animate-bounce,
            .animate-spin,
            .floating-shape,
            .light-ray,
            .particle {
                animation: none !important;
            }
        }
        
        /* Performance Optimizations */
        .will-change-transform {
            will-change: transform;
        }
        
        .will-change-opacity {
            will-change: opacity;
        }
        
        .gpu-accelerated {
            transform: translateZ(0);
            backface-visibility: hidden;
            perspective: 1000px;
        }
        
        /* Touch Target Improvements */
        @media (hover: none) and (pointer: coarse) {
            .service-card-futuristic,
            .service-icon-mobile,
            .nav-link,
            button,
            [role="button"] {
                min-height: 44px !important;
                min-width: 44px !important;
            }
            
            /* Improve button touch targets */
            .success-nav-btn {
                min-height: 48px !important;
                min-width: 48px !important;
            }
            
            /* Enhanced mobile menu touch targets */
            .mobile-menu-item {
                min-height: 48px !important;
                display: flex !important;
                align-items: center !important;
            }
            
            /* Mobile menu adjustments */
            #mobile-menu {
                margin: 0.5rem !important;
                max-width: calc(100vw - 1rem) !important;
            }
        }
        
        /* Mobile-specific menu improvements */
        @media (max-width: 640px) {
            #mobile-menu {
                left: 0.5rem;
                right: 0.5rem;
                margin-left: 0;
                margin-right: 0;
            }
            
            .mobile-menu-item {
                font-size: 0.9rem;
                padding: 0.875rem 1rem;
            }
            
            /* Improve mobile menu visibility */
            #mobile-menu > div {
                box-shadow: 
                    0 25px 50px -12px rgba(0, 0, 0, 0.5),
                    0 0 0 1px rgba(6, 182, 212, 0.2),
                    0 0 20px rgba(6, 182, 212, 0.1);
            }
        }
        
        @media (max-width: 380px) {
            #mobile-menu {
                left: 0.25rem;
                right: 0.25rem;
            }
            
            .mobile-menu-item {
                font-size: 0.85rem;
                padding: 0.75rem 0.875rem;
            }
        }
        
        /* Landscape phone adjustments */
        @media screen and (max-height: 500px) and (orientation: landscape) {
            #mobile-menu {
                max-height: 300px;
                overflow-y: auto;
            }
            
            .mobile-menu-item {
                padding: 0.625rem 1rem;
            }
            
            /* Hide menu header and footer on landscape to save space */
            #mobile-menu .bg-gradient-to-r:first-child,
            #mobile-menu .bg-gradient-to-r:last-child {
                display: none;
            }
        }
        
        /* Enhanced Animation Performance */
        @keyframes optimizedFloat {
            0%, 100% {
                transform: translate3d(0, 0, 0) rotate(0deg);
            }
            50% {
                transform: translate3d(0, -20px, 0) rotate(180deg);
            }
        }
        
        .service-card-futuristic {
            will-change: transform, opacity;
            transform: translateZ(0);
            backface-visibility: hidden;
        }
        
        .testimonial-card {
            will-change: contents;
            transform: translateZ(0);
            backface-visibility: hidden;
        }
        
        /* Improved Scrollbar Styling */
        .scrollbar-thin {
            scrollbar-width: thin;
            scrollbar-color: rgba(6, 182, 212, 0.3) transparent;
        }
        
        .scrollbar-thin::-webkit-scrollbar {
            width: 6px;
        }
        
        .scrollbar-thin::-webkit-scrollbar-track {
            background: transparent;
        }
        
        .scrollbar-thin::-webkit-scrollbar-thumb {
            background: rgba(6, 182, 212, 0.3);
            border-radius: 3px;
        }
        
        .scrollbar-thin::-webkit-scrollbar-thumb:hover {
            background: rgba(6, 182, 212, 0.5);
        }
        
        /* Loading Placeholder for Images */
        .image-placeholder {
            background: linear-gradient(90deg, rgba(75, 85, 99, 0.2) 0%, rgba(75, 85, 99, 0.4) 50%, rgba(75, 85, 99, 0.2) 100%);
            background-size: 200px 100%;
            animation: loading-placeholder 1.5s ease-in-out infinite;
        }
        
        @keyframes loading-placeholder {
            0% {
                background-position: -200px 0;
            }
            100% {
                background-position: calc(200px + 100%) 0;
            }
        }
        
        .shape-1 {
            top: 15%;
            left: 5%;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            animation-delay: 1s;
        }
        
        .shape-2 {
            top: 80%;
            right: 25%;
            width: 12px;
            height: 12px;
            transform: rotate(45deg);
            animation-delay: 4s;
        }
        
        .shape-3 {
            top: 50%;
            left: 3%;
            width: 6px;
            height: 20px;
            border-radius: 3px;
            animation-delay: 7s;
        }
        
        .shape-4 {
            bottom: 20%;
            right: 5%;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            animation-delay: 2s;
        }
        
        /* Light Rays */
        .light-ray {
            position: absolute;
            background: linear-gradient(to bottom, transparent, rgba(0,245,255,0.2), transparent);
            width: 2px;
            animation: lightRay 4s ease-in-out infinite;
        }
        
        .ray-1 {
            top: 0;
            left: 20%;
            height: 100%;
            animation-delay: 0s;
        }
        
        .ray-2 {
            top: 0;
            left: 40%;
            height: 100%;
            animation-delay: 1s;
        }
        
        .ray-3 {
            top: 0;
            right: 30%;
            height: 100%;
            animation-delay: 2s;
        }
        
        .ray-4 {
            top: 0;
            right: 10%;
            height: 100%;
            animation-delay: 3s;
        }
        
        /* Typing Effect */
        #typed-text {
            white-space: nowrap;
            display: inline-block;
            min-width: 10px;
            text-align: left;
        }
        
        .typing-cursor {
            animation: typingCursor 1s infinite;
            color: #00f5ff;
            font-weight: normal;
        }
        
        /* Enhanced Buttons */
        .cta-primary {
            background: linear-gradient(135deg, #00f5ff, #0080ff);
            box-shadow: 0 8px 32px rgba(0, 245, 255, 0.3);
            position: relative;
            overflow: hidden;
            will-change: transform, box-shadow;
            transform: translateZ(0);
            backface-visibility: hidden;
        }
        
        .cta-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
            will-change: transform;
        }
        
        .cta-primary:hover::before {
            left: 100%;
        }
        
        .cta-secondary {
            background: rgba(17, 24, 39, 0.8);
            backdrop-filter: blur(10px);
            border: 2px solid rgba(75, 85, 99, 0.5);
            will-change: transform, border-color, box-shadow;
            transform: translateZ(0);
        }
        
        .cta-secondary:hover {
            border-color: #00f5ff;
            box-shadow: 0 0 20px rgba(0, 245, 255, 0.3);
        }
        
        /* Counter Animation */
        .counter-number {
            animation: counterUp 0.8s ease-out forwards;
        }
        
        /* Badge Animation */
        .animate-fadeIn {
            animation: fadeIn 1s ease-out 0.5s both;
        }
        
        /* Grid Pattern Enhancement */
        .grid-pattern {
            background-attachment: fixed;
        }
        
        .grid-pattern:hover {
            opacity: 0.05 !important;
            transition: opacity 0.3s ease;
        }
        
        /* Image Animation Classes */
        .animate-spin-slow {
            animation: spin-slow 20s linear infinite;
        }
        
        .animate-spin-reverse {
            animation: spin-reverse 15s linear infinite;
        }
        
        .animate-float-slow {
            animation: float-slow 6s ease-in-out infinite;
        }
        
        .animate-float-medium {
            animation: float-medium 4s ease-in-out infinite;
        }
        
        .animate-float-fast {
            animation: float-fast 3s ease-in-out infinite;
        }
        
        /* Vertical Scroll Animations for Clients */
        @keyframes scroll-up {
            100% { transform: translateY(-50%); }
        }
        
        @keyframes scroll-down {
            0% { transform: translateY(-50%); }
            100% { transform: translateY(0); }
        }
        
        @keyframes scroll-up-slow {
            0% { transform: translateY(0); }
            100% { transform: translateY(-50%); }
        }
        
        .animate-scroll-up {
            animation: scroll-up 8s linear infinite;
        }
        
        .animate-scroll-down {
            animation: scroll-down 10s linear infinite;
        }
        
        .animate-scroll-up-slow {
            animation: scroll-up-slow 9s linear infinite;
        }
        
        /* Pause animation on hover */
        .animate-scroll-up:hover,
        .animate-scroll-up-slow:hover,
        .animate-scroll-down:hover {
            animation-play-state: paused;
        }
        
        /* Clients scroll container */
        .clients-scroll-container {
            width: 450px;
            max-height: 70vh;
            
            overflow: hidden;
            mask: linear-gradient(0deg, transparent, white 10%, white 90%, transparent);
            -webkit-mask: linear-gradient(0deg, transparent, white 10%, white 90%, transparent);
        }
        
        .clients-column {
            width: 120px;
            min-height: 100%; /* Ensure enough content for smooth scrolling */
        }
        
        /* Ensure content is properly centered */
        .fullpage-section > .max-w-7xl,
        .fullpage-section > div:not(.absolute) {
            z-index: 10;
            position: relative;
        }
        
        /* Testimonial Section Styles */
        @keyframes floatPattern {
            0%, 100% { 
                transform: translateY(0px) rotate(0deg); 
            }
            33% { 
                transform: translateY(-10px) rotate(1deg); 
            }
            66% { 
                transform: translateY(5px) rotate(-0.5deg); 
            }
        }
        
        @keyframes borderGlow {
            0%, 100% {
                opacity: 0.7;
            }
            50% {
                opacity: 1;
            }
        }
        
        @keyframes statusPulse {
            0%, 100% {
                opacity: 0.8;
            }
            50% {
                opacity: 1;
            }
        }

        /* Enhanced Success Stories Carousel */
        .success-stories-carousel {
            position: relative;
            overflow: hidden;
            border-radius: 1.5rem;
            /* Enhanced masking to hide adjacent cards */
            mask: linear-gradient(90deg, transparent 0%, white 20%, white 80%, transparent 100%);
            -webkit-mask: linear-gradient(90deg, transparent 0%, white 20%, white 80%, transparent 100%);
            /* Performance optimizations */
            will-change: transform;
            transform: translateZ(0);
            backface-visibility: hidden;
        }

        .success-stories-track {
            display: flex;
            transition: transform 0.7s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            /* Performance optimizations */
            will-change: transform;
            transform: translateZ(0);
            backface-visibility: hidden;
        }

        .success-story-slide {
            flex: none;
            width: 100%;
            /* Ensure each slide takes full width */
            min-width: 100%;
            /* Performance optimizations */
            will-change: contents;
        }
        
        /* Mobile carousel positioning fine-tuning */
        @media (max-width: 767px) {
            .success-story-slide {
                /* Ensure proper centering on mobile */
                display: flex;
                justify-content: center;
            }
        }

        /* Responsive adjustments for success stories */
        @media (max-width: 1024px) {
            .success-stories-carousel {
                padding-left: 2rem;
                padding-right: 2rem;
                /* Maintain masking on tablet */
                mask: linear-gradient(90deg, transparent 0%, white 15%, white 85%, transparent 100%);
                -webkit-mask: linear-gradient(90deg, transparent 0%, white 15%, white 85%, transparent 100%);
            }
        }

        @media (max-width: 768px) {
            .success-stories-carousel {
                padding-left: 3rem;
                padding-right: 3rem;
                /* Softer masking for mobile to avoid content cutting */
                mask: linear-gradient(90deg, transparent 0%, white 8%, white 92%, transparent 100%);
                -webkit-mask: linear-gradient(90deg, transparent 0%, white 8%, white 92%, transparent 100%);
            }

            .success-stories-section {
                width: 100%;
                text-align: center;
                padding-right: 0;
            }
            
            /* Improve slide centering on mobile */
            .success-story-slide {
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 0 1rem;
            }
            
            /* Adjust navigation buttons position for mobile */
            .success-nav-left {
                left: 0.5rem !important;
            }
            
            .success-nav-right {
                right: 0.5rem !important;
            }
        }

        .success-nav-btn {
            z-index: 30;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .success-nav-btn:hover {
            transform: translateY(-50%) scale(1.05);
        }

        .success-nav-btn:active {
            transform: translateY(-50%) scale(0.95);
        }

        /* Enhanced Case Study Cards */
        .case-study-card-enhanced {
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .case-study-card-enhanced:hover {
            filter: brightness(1.05);
        }
        
        .case-study-card-enhanced > div {
            min-height: 280px;
        }
        
        @media (min-width: 1024px) {
            .case-study-card-enhanced > div {
                min-height: 320px;
            }
        }
        
        .success-stories-carousel {
            height: auto !important;
        }
        
        .success-stories-track {
            /* Ensure all slides align properly */
            align-items: stretch;
        }
        
        /* Mobile-specific improvements for case study cards */
        @media (max-width: 768px) {
            .case-study-card-enhanced {
                margin: 0 0.5rem;
            }
            
            /* Better text sizing on mobile */
            .case-study-card-enhanced .text-lg {
                font-size: 1rem !important;
                line-height: 1.4 !important;
            }
            
            .case-study-card-enhanced .text-xl {
                font-size: 1.1rem !important;
                line-height: 1.3 !important;
            }
            
            .case-study-card-enhanced .text-2xl {
                font-size: 1.2rem !important;
                line-height: 1.3 !important;
            }
            
            /* Adjust grid layout on mobile for better readability */
            .case-study-card-enhanced .grid-cols-1.lg\\:grid-cols-2 {
                grid-template-columns: 1fr !important;
                gap: 0.5rem !important;
            }
            
            /* Better spacing for bullet points */
            .case-study-card-enhanced .flex.items-start {
                padding: 0.375rem 0.5rem !important;
                margin-bottom: 0.25rem;
            }
            
            /* Optimize logo size for mobile */
            .case-study-card-enhanced .w-16.h-16 {
                width: 3.5rem !important;
                height: 3.5rem !important;
            }
            
            .case-study-card-enhanced .w-12.h-12 {
                width: 2.75rem !important;
                height: 2.75rem !important;
            }
            
            /* Mobile case study details optimization */
            .mobile-case-study-details {
                max-height: none !important;
                overflow: visible !important;
            }
            
            .mobile-case-study-details .flex.items-start {
                align-items: flex-start !important;
                min-height: auto !important;
            }
            
            .mobile-case-study-details .flex.items-start span {
                display: block !important;
                line-height: 1.3 !important;
                word-wrap: break-word !important;
                hyphens: auto !important;
            }
        }
        
        @media (max-width: 480px) {
            .case-study-card-enhanced {
                margin: 0 0.25rem;
            }
            
            /* Even more compact on very small screens */
            .case-study-card-enhanced .p-4 {
                padding: 0.875rem !important;
            }
            
            .case-study-card-enhanced .mb-4 {
                margin-bottom: 0.75rem !important;
            }
            
            .case-study-card-enhanced .mb-2 {
                margin-bottom: 0.375rem !important;
            }
            
            /* Ultra-mobile carousel adjustments */
            .success-stories-carousel {
                padding-left: 2rem !important;
                padding-right: 2rem !important;
                mask: linear-gradient(90deg, transparent 0%, white 5%, white 95%, transparent 100%) !important;
                -webkit-mask: linear-gradient(90deg, transparent 0%, white 5%, white 95%, transparent 100%) !important;
            }
            
            .success-nav-left {
                left: 0.25rem !important;
            }
            
            .success-nav-right {
                right: 0.25rem !important;
            }
            
            /* Improve text readability on very small screens */
            .case-study-card-enhanced .text-xs {
                font-size: 0.7rem !important;
                line-height: 1.2 !important;
            }
        }

        /* Additional mobile-specific improvements for case studies */
        @media (max-width: 640px) {
            /* Ensure proper card width on mobile */
            .success-story-slide > div {
                max-width: calc(100vw - 4rem) !important;
                width: 100% !important;
            }
            
            .case-study-card-enhanced > div {
                display: flex !important;
                flex-direction: column !important;
                justify-content: space-between !important;
                min-height: auto !important;
                padding-bottom: 1.5rem !important;
            }
            
            .case-study-card-enhanced .flex-1 {
                flex-grow: 1 !important;
                margin-bottom: 1rem !important;
            }
            
            .case-study-card-enhanced .flex.items-center.mb-2 {
                margin-bottom: 0.75rem !important;
                align-items: flex-start !important;
            }
            
            /* Better project title section */
            .case-study-card-enhanced .mb-4.sm\\:mb-6 {
                margin-bottom: 0.875rem !important;
            }
        }

        /* Floating animation for decorative elements */
        @keyframes floatDecor {
            0%, 100% { transform: translateY(0px) scale(1); }
            50% { transform: translateY(-5px) scale(1.05); }
        }

        .case-study-card-enhanced:hover .absolute.blur-xl,
        .case-study-card-enhanced:hover .absolute.blur-lg {
            animation: floatDecor 3s ease-in-out infinite;
        }

        /* Infinite Testimonials Slider */
        .testimonials-infinite-container {
            overflow: hidden;
            mask: linear-gradient(90deg, transparent, white 10%, white 90%, transparent);
            -webkit-mask: linear-gradient(90deg, transparent, white 10%, white 90%, transparent);
        }

        .testimonials-infinite-track {
            width: calc(500px * 8 + 6px * 7); /* 8 testimonials + gaps */
        }

        .testimonials-hover-overlay:hover + .testimonials-infinite-track,
        .testimonials-infinite-container:hover .testimonials-infinite-track {
            animation-play-state: paused;
        }

        /* Dynamic animations will be generated by JavaScript */
        
        .testimonial-card {
            animation: fadeInUp 0.6s ease-out forwards;
            opacity: 0;
        }
        
        .testimonial-card:hover {
            transition: all 0.3s ease;
        }
        
        .testimonial-card:nth-child(1) { animation-delay: 0.05s; }
        .testimonial-card:nth-child(2) { animation-delay: 0.1s; }
        .testimonial-card:nth-child(3) { animation-delay: 0.15s; }
        .testimonial-card:nth-child(4) { animation-delay: 0.2s; }
        .testimonial-card:nth-child(5) { animation-delay: 0.25s; }
        .testimonial-card:nth-child(6) { animation-delay: 0.3s; }
        
        /* Testimonials Responsive Improvements */
        @media (max-width: 1024px) {
            .testimonials-infinite-container {
                width: 100%;
                padding: 0.5rem 0;
            }
            
            .testimonials-infinite-track {
                gap: 1rem;
            }
        }

        @media (max-width: 768px) {
            .testimonials-infinite-container {
                padding: 1rem 0;
            }
            
            .testimonials-infinite-track {
                gap: 0.75rem;
                mask: linear-gradient(90deg, transparent 0%, white 10%, white 90%, transparent 100%) !important;
                -webkit-mask: linear-gradient(90deg, transparent 0%, white 10%, white 90%, transparent 100%) !important;
            }
            
            .testimonial-card {
                min-width: 280px;
            }
            
            .testimonial-card .relative {
                background: rgba(17, 24, 39, 0.9) !important;
                backdrop-filter: none !important;
            }
        }

        @media (max-width: 640px) {
            .testimonials-infinite-track {
                animation-duration: 25s !important; /* Slower on mobile for readability */
            }
        }
        
        @media (max-width: 1024px) {
            .testimonial-card {
                width: 350px !important;
            }
            
            .testimonial-card .relative {
                padding: 1rem !important;
            }
            
            .testimonial-card svg {
                width: 35px !important;
                height: 35px !important;
            }
            
            .testimonial-card blockquote {
                font-size: 0.875rem !important;
                margin-bottom: 0.75rem !important;
            }
            
            .testimonial-card .flex.items-center {
                gap: 0.5rem !important;
            }
            
            .testimonial-card .w-10.h-10 {
                width: 2rem !important;
                height: 2rem !important;
                font-size: 0.75rem !important;
            }
            
            .testimonial-card h4 {
                font-size: 0.75rem !important;
            }
        }

        @media (max-width: 768px) {
            .testimonial-card {
                width: 300px !important;
            }
            
            .testimonial-card .relative {
                padding: 0.875rem !important;
            }
            
            .testimonial-card svg {
                width: 30px !important;
                height: 30px !important;
            }
            
            .testimonial-card blockquote {
                font-size: 0.8125rem !important;
            }
        }

        @media (max-width: 640px) {
            .testimonial-card {
                width: 280px !important;
            }
        }
        
        /* Improve testimonial card readability */
        .testimonial-card .bg-gradient-to-t {
            background: linear-gradient(to top, rgba(17, 24, 39, 0.2), rgba(17, 24, 39, 0.1), transparent) !important;
        }
        
        .testimonial-card blockquote {
            text-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
        }
        
        .testimonial-card h4, .testimonial-card p {
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* AI Agent section needs special handling */
        #ai-agent.fullpage-section {
            padding: 4rem 0; /* More padding for content */
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .fullpage-section {
                min-height: auto;
                padding: 3rem 0;
            }
            
            #home.fullpage-section {
                min-height: 100vh;
                padding: 2rem 0;
            }
            
            #ai-agent.fullpage-section {
                padding: 3rem 0;
            }
        }
        
        /* Better spacing for sections */
        .section-spacing {
            padding: 4rem 0;
        }
        
        .section-spacing-large {
            padding: 6rem 0;
        }
        
        /* Custom gradient text */
        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        /* Section Navigation Menu */
        .section-nav-menu {
            position: fixed;
            right: 2rem;
            top: 50%;
            transform: translateY(-50%);
            z-index: 60;
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }
        
        .section-nav-item {
            position: relative;
            width: 4rem;
            height: 4rem;
            border-radius: 1rem;
            background: rgba(17, 24, 39, 0.9);
            border: 1px solid rgba(59, 130, 246, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }
        
        .section-nav-item:hover {
            background: rgba(59, 130, 246, 0.2);
            border-color: rgba(59, 130, 246, 0.6);
            transform: scale(1.1);
            box-shadow: 0 8px 32px rgba(59, 130, 246, 0.3);
        }
        
        .section-nav-item.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 4px 20px rgba(102, 126, 234, 0.4);
        }
        
        .section-nav-item .nav-icon {
            width: 1.5rem;
            height: 1.5rem;
            color: white;
            transition: transform 0.3s ease;
        }
        
        .section-nav-item:hover .nav-icon {
            transform: scale(1.2);
        }
        
        .section-nav-item .nav-label {
            position: absolute;
            right: 100%;
            margin-right: 1rem;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            white-space: nowrap;
            opacity: 0;
            transform: translateX(10px);
            transition: all 0.3s ease;
            pointer-events: none;
        }
        
        .section-nav-item:hover .nav-label {
            opacity: 1;
            transform: translateX(0);
        }
        
        /* Logo Item Specific Styling */
        .section-nav-item.logo-item {
            background: linear-gradient(135deg, rgba(255, 165, 0, 0.2), rgba(255, 140, 0, 0.2));
            border: 1px solid rgba(255, 165, 0, 0.3);
            box-shadow: 0 4px 20px rgba(255, 165, 0, 0.2);
            margin-bottom: 0.75rem;
            position: relative;
        }
        
        .section-nav-item.logo-item:hover {
            background: linear-gradient(135deg, rgba(255, 165, 0, 0.4), rgba(255, 140, 0, 0.4));
            border: 1px solid rgba(255, 165, 0, 0.5);
            transform: scale(1.15);
            box-shadow: 0 8px 32px rgba(255, 165, 0, 0.4);
        }
        
        /* Logo Item Active State (when it's the home section) */
        .section-nav-item.logo-item.active {
            background: linear-gradient(135deg, rgba(255, 165, 0, 0.3), rgba(255, 140, 0, 0.3));
            border: 1px solid rgba(255, 165, 0, 0.6);
            box-shadow: 0 4px 20px rgba(255, 165, 0, 0.4);
        }
        
        /* Add separator line after logo */
        .section-nav-item.logo-item::after {
            content: '';
            position: absolute;
            bottom: -0.75rem;
            left: 50%;
            transform: translateX(-50%);
            width: 2rem;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(255, 165, 0, 0.6), transparent);
            border-radius: 1px;
        }
        
        /* Hide section nav on mobile */
        @media (max-width: 1024px) {
            .section-nav-menu {
                display: none;
            }
        }
        
        /* Mobile Bottom Navigation */
        @media (max-width: 1024px) {
            .section-nav-menu {
                display: flex;
                position: fixed;
                bottom: 1rem;
                left: 50%;
                transform: translateX(-50%);
                top: auto;
                right: auto;
                flex-direction: row;
                gap: 0.5rem;
                background: rgba(0, 0, 0, 0.9);
                padding: 0.75rem 1rem;
                border-radius: 2rem;
                border: 1px solid rgba(255, 255, 255, 0.1);
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
                max-width: 90vw;
                overflow-x: auto;
                z-index: 100;
            }
            
            .section-nav-item {
                width: 3rem;
                height: 3rem;
                flex-shrink: 0;
                border-radius: 0.75rem;
                background: rgba(255, 255, 255, 0.05);
                backdrop-filter: blur(10px);
                border: 1px solid rgba(255, 255, 255, 0.1);
            }
            
            .section-nav-item:hover {
                background: rgba(255, 255, 255, 0.15);
                transform: translateY(-2px);
            }
            
            .section-nav-item.active {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                box-shadow: 0 4px 20px rgba(102, 126, 234, 0.6);
            }
            
            .section-nav-item .nav-icon {
                width: 1.25rem;
                height: 1.25rem;
            }
            
            .section-nav-item .nav-label {
                position: absolute;
                bottom: 100%;
                left: 50%;
                transform: translateX(-50%);
                margin-bottom: 0.5rem;
                right: auto;
                margin-right: 0;
                font-size: 0.75rem;
                padding: 0.25rem 0.5rem;
                border-radius: 0.375rem;
                background: rgba(0, 0, 0, 0.9);
                white-space: nowrap;
            }
            
            .section-nav-item:hover .nav-label {
                opacity: 1;
                transform: translateX(-50%) translateY(-2px);
            }
            
            /* Logo item adjustments for mobile */
            .section-nav-item.logo-item {
                margin-bottom: 0;
                background: linear-gradient(135deg, rgba(255, 165, 0, 0.3), rgba(255, 140, 0, 0.3));
                border: 1px solid rgba(255, 165, 0, 0.4);
            }
            
            .section-nav-item.logo-item:hover {
                background: linear-gradient(135deg, rgba(255, 165, 0, 0.5), rgba(255, 140, 0, 0.5));
                transform: translateY(-2px) scale(1.05);
            }
            
            .section-nav-item.logo-item::after {
                display: none;
            }
            
            /* AI Agent item adjustments for mobile */
            .section-nav-item.ai-agent-nav-item img {
                width: 1.5rem;
                height: 1.5rem;
            }
            
            .section-nav-item.ai-agent-nav-item .nav-label {
                font-size: 0.75rem;
            }
            
            /* Ensure bottom nav doesn't interfere with scrolling */
            .section-nav-menu {
                -webkit-overflow-scrolling: touch;
                scrollbar-width: none;
            }
            
            .section-nav-menu::-webkit-scrollbar {
                display: none;
            }
            
            /* Add subtle animation for mobile nav appearance */
            .section-nav-menu {
                animation: slideUpFade 0.5s ease-out;
            }
            
            @keyframes slideUpFade {
                from {
                    opacity: 0;
                    transform: translateX(-50%) translateY(100%);
                }
                to {
                    opacity: 1;
                    transform: translateX(-50%) translateY(0);
                }
            }
        }
        
        /* Floating AI Bot Mobile Adjustments */
        @media (max-width: 1024px) {
            .floating-ai-bot {
                bottom: 6rem !important; /* Above the bottom navigation */
                right: 1rem !important;
                z-index: 110 !important;
            }
            
            .floating-ai-bot .group {
                flex-direction: column-reverse;
                align-items: center;
            }
            
            .floating-ai-bot .group > div:first-child {
                margin-right: 0;
                margin-bottom: 0.5rem;
                display: none; /* Hide chat balloon on mobile to save space */
            }
            
            .floating-ai-bot .relative:last-child > div:last-child {
                width: 3.5rem;
                height: 3.5rem;
            }
        }
        
        @media (max-width: 640px) {
            .floating-ai-bot {
                bottom: 5.5rem !important;
                right: 0.75rem !important;
            }
            
            .floating-ai-bot .relative:last-child > div:last-child {
                width: 3rem;
                height: 3rem;
            }
        }
        
        /* Chat Mobile Optimizations */
        @media (max-width: 768px) {
            #chat-container {
                background: rgba(0, 0, 0, 0.4) !important;
                backdrop-filter: none !important;
                border: 2px solid rgba(168, 85, 247, 0.6) !important;
            }
            
            #chat-container .bg-gradient-to-br {
                background: rgba(59, 130, 246, 0.15) !important;
                backdrop-filter: none !important;
            }
            
            #chat-input {
                background: rgba(147, 51, 234, 0.4) !important;
                backdrop-filter: none !important;
                border: 2px solid rgba(147, 51, 234, 0.6) !important;
            }
            
            /* Ensure chat messages have solid backgrounds for readability */
            .bg-gradient-to-br.from-blue-500\/10 {
                background: rgba(59, 130, 246, 0.2) !important;
                backdrop-filter: none !important;
                border: 1px solid rgba(6, 182, 212, 0.4) !important;
            }
        }
        
        /* Tablet specific adjustments */
        @media (min-width: 769px) and (max-width: 1024px) {
            .section-nav-menu {
                bottom: 1.5rem;
                gap: 0.75rem;
                padding: 1rem 1.25rem;
            }
            
            .section-nav-item {
                width: 3.5rem;
                height: 3.5rem;
            }
            
            .section-nav-item .nav-icon {
                width: 1.375rem;
                height: 1.375rem;
            }
            
            .section-nav-item .nav-label {
                font-size: 0.8125rem;
                padding: 0.375rem 0.625rem;
            }
            
            .section-nav-item.ai-agent-nav-item img {
                width: 1.75rem;
                height: 1.75rem;
            }
        }
        
        /* Footer Animations */
        @keyframes footerPattern {
            0% {
                background-position: 0% 0%, 0% 0%, 0% 0%;
            }
            100% {
                background-position: 100% 100%, -100% -100%, 50% 50%;
            }
        }
        
        /* Footer Link Hover Effects */
        footer a:hover {
            transform: translateX(5px);
        }
        
        /* Footer Social Media Hover */
        footer .social-media-link {
            position: relative;
            overflow: hidden;
        }
        
        footer .social-media-link::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: all 0.4s ease;
        }
        
        footer .social-media-link:hover::before {
            width: 100px;
            height: 100px;
        }
        
        /* Newsletter Input Focus Effects */
        footer input:focus {
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
            background: rgba(55, 65, 81, 0.8);
        }
        
        /* Footer Fade In Animation */
        footer {
            animation: footerFadeIn 1s ease-out;
        }
        
        @keyframes footerFadeIn {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* AI Agent Custom Animations */
        @keyframes bounce-slow {
            0%, 100% { 
                transform: translateY(0px) scale(1);
                filter: brightness(1);
            }
            25% { 
                transform: translateY(-3px) scale(1.02);
                filter: brightness(1.1);
            }
            50% { 
                transform: translateY(-6px) scale(1.05);
                filter: brightness(1.2);
            }
            75% { 
                transform: translateY(-3px) scale(1.02);
                filter: brightness(1.1);
            }
        }
        
        @keyframes ai-glow-pulse {
            0%, 100% { 
                box-shadow: 0 0 5px rgba(59, 130, 246, 0.3);
                opacity: 0.7;
            }
            50% { 
                box-shadow: 0 0 20px rgba(59, 130, 246, 0.6), 0 0 30px rgba(147, 51, 234, 0.4);
                opacity: 1;
            }
        }
        
        /* Enhanced AI Navigation Item Styles */
        .ai-agent-nav-item {
            position: relative;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .ai-agent-nav-item::before {
            content: '';
            position: absolute;
            inset: -2px;
            border-radius: 50%;
            background: linear-gradient(45deg, transparent, rgba(59, 130, 246, 0.3), transparent);
            opacity: 0;
            animation: ai-glow-pulse 3s ease-in-out infinite;
        }
        
        .ai-agent-nav-item:hover::before {
            opacity: 1;
            animation: ai-glow-pulse 1s ease-in-out infinite;
        }
        
        /* Bounce slow animation class */
        .animate-bounce-slow {
            animation: bounce-slow 2s ease-in-out infinite;
        }
        
        /* New keyframes for Services section */
        @keyframes techPulse {
            0%, 100% { 
                opacity: 0.3; 
                transform: scale(1); 
                filter: hue-rotate(0deg);
            }
            50% { 
                opacity: 0.8; 
                transform: scale(1.02); 
                filter: hue-rotate(30deg);
            }
        }
        
        @keyframes gridShift {
            0% { 
                transform: translateX(0) translateY(0); 
                opacity: 0.1;
            }
            33% { 
                transform: translateX(-5px) translateY(-3px); 
                opacity: 0.3;
            }
            66% { 
                transform: translateX(5px) translateY(3px); 
                opacity: 0.2;
            }
            100% { 
                transform: translateX(0) translateY(0); 
                opacity: 0.1;
            }
        }
        
        /* Service Card Futuristic Styles */
        .service-card-futuristic {
            position: relative;
            width: 100%;
            cursor: pointer;
            transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        @media (min-width: 640px) {
            .service-card-futuristic {
                width: 195px;
            }
        }
        
        .service-card-futuristic:hover {
            transform: translateY(-10px) scale(1.02);
            animation-play-state: paused;
        }
        
        @keyframes pulseGlow {
            0%, 100% { 
                opacity: 0.4; 
                transform: scale(1);
            }
            50% { 
                opacity: 0.8; 
                transform: scale(1.05);
            }
        }
        
        @keyframes floatingDot {
            0%, 100% { 
                transform: translateY(0px); 
                opacity: 0.6;
            }
            50% { 
                transform: translateY(-3px); 
                opacity: 1;
            }
        }

        /* Horizontal Scroll Animation for Mobile Clients */
        @keyframes scroll-horizontal {
            0% {
                transform: translateX(0);
            }
            100% {
                transform: translateX(-50%);
            }
        }

        @keyframes scroll-horizontal-reverse {
            0% {
                transform: translateX(-50%);
            }
            100% {
                transform: translateX(0);
            }
        }

        .animate-scroll-horizontal {
            animation: scroll-horizontal 15s linear infinite;
        }

        .animate-scroll-horizontal-reverse {
            animation: scroll-horizontal-reverse 15s linear infinite;
        }

        /* Pause animation on hover */
        .animate-scroll-horizontal:hover,
        .animate-scroll-horizontal-reverse:hover {
            animation-play-state: paused;
        }

        /* Ensure smooth scrolling */
        .clients-horizontal-container {
            overflow: hidden;
            mask: linear-gradient(90deg, transparent, white 10%, white 90%, transparent);
            -webkit-mask: linear-gradient(90deg, transparent, white 10%, white 90%, transparent);
        }
    </style>

    <!-- JavaScript for interactions -->
    <script>
        // Initialize Vanta.js NET background
        function initVantaBackground() {
            VANTA.NET({
                el: "#vanta-bg",
                mouseControls: true,
                touchControls: true,
                gyroControls: false,
                minHeight: 200.00,
                minWidth: 200.00,
                scale: 1.00,
                scaleMobile: 1.00,
                color: 0x234E93, // Blue color
                backgroundColor: 0x000000, // Pure black for transparency
                backgroundAlpha: 0.3, // Reduced background opacity
                points: 8.00, // Reduced points for less visual clutter
                maxDistance: 25.00, // Increased max distance
                spacing: 18.00 // Increased spacing
            });
        }
        
        // Initialize the hero background as soon as the page is ready.
        window.addEventListener('load', function() {
            initVantaBackground();
        });
        
        // Add animation on scroll
        // Fullpage scroll functionality
        let isScrolling = false;
        let currentSection = 0;
        const sections = document.querySelectorAll('.fullpage-section');
        
        // Smooth scroll to section
        function scrollToSection(index) {
            if (index >= 0 && index < sections.length) {
                sections[index].scrollIntoView({ behavior: 'smooth' });
                currentSection = index;
            }
        }
        
        // Wheel event handler for section navigation
        function handleWheel(e) {
            if (isScrolling) return;
            
            isScrolling = true;
            
            if (e.deltaY > 0) {
                // Scroll down
                if (currentSection < sections.length - 1) {
                    scrollToSection(currentSection + 1);
                }
            } else {
                // Scroll up
                if (currentSection > 0) {
                    scrollToSection(currentSection - 1);
                }
            }
            
            setTimeout(() => {
                isScrolling = false;
            }, 1000); // Prevent rapid scrolling
        }
        
        // Touch events for mobile
        let touchStartY = 0;
        let touchEndY = 0;
        
        function handleTouchStart(e) {
            touchStartY = e.changedTouches[0].screenY;
        }
        
        function handleTouchEnd(e) {
            if (isScrolling) return;
            
            touchEndY = e.changedTouches[0].screenY;
            const deltaY = touchStartY - touchEndY;
            
            if (Math.abs(deltaY) > 50) { // Minimum swipe distance
                isScrolling = true;
                
                if (deltaY > 0) {
                    // Swipe up (scroll down)
                    if (currentSection < sections.length - 1) {
                        scrollToSection(currentSection + 1);
                    }
                } else {
                    // Swipe down (scroll up)
                    if (currentSection > 0) {
                        scrollToSection(currentSection - 1);
                    }
                }
                
                setTimeout(() => {
                    isScrolling = false;
                }, 1000);
            }
        }
        
        // Keyboard navigation
        function handleKeydown(e) {
            if (isScrolling) return;
            
            switch(e.key) {
                case 'ArrowDown':
                case 'PageDown':
                    e.preventDefault();
                    if (currentSection < sections.length - 1) {
                        scrollToSection(currentSection + 1);
                    }
                    break;
                case 'ArrowUp':
                case 'PageUp':
                    e.preventDefault();
                    if (currentSection > 0) {
                        scrollToSection(currentSection - 1);
                    }
                    break;
                case 'Home':
                    e.preventDefault();
                    scrollToSection(0);
                    break;
                case 'End':
                    e.preventDefault();
                    scrollToSection(sections.length - 1);
                    break;
            }
        }
        
        // Intersection Observer to track current section
        const sectionObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const sectionIndex = Array.from(sections).indexOf(entry.target);
                    currentSection = sectionIndex;
                }
            });
        }, {
            threshold: 0.5
        });
        
        // Section Navigation Control
        function initSectionNavigation() {
            const sectionNavItems = document.querySelectorAll('.section-nav-item');
            
            // Update active section in navigation menu
            function updateActiveSection() {
                const sections = window.prosigmakaSectionIds || ['home', 'clients', 'services', 'ai-agent', 'case-study'];
                const footer = document.getElementById('footer');
                let activeSection = 'home';
                let isInFooter = false;
                
                // Check if footer is visible in viewport
                if (footer) {
                    const footerRect = footer.getBoundingClientRect();
                    // If footer is significantly visible (more than 30% of viewport height)
                    if (footerRect.top < window.innerHeight * 0.7) {
                        isInFooter = true;
                    }
                }
                
                // Only check sections if not in footer
                if (!isInFooter) {
                    sections.forEach(sectionId => {
                        const section = document.getElementById(sectionId);
                        if (section) {
                            const rect = section.getBoundingClientRect();
                            // Check if section is in viewport (at least 50% visible)
                            if (rect.top <= window.innerHeight * 0.5 && rect.bottom >= window.innerHeight * 0.5) {
                                activeSection = sectionId;
                            }
                        }
                    });
                }
                
                // Update active state in navigation
                sectionNavItems.forEach(item => {
                    item.classList.remove('active');
                    // Only add active class if not in footer
                    if (!isInFooter && item.dataset.section === activeSection) {
                        item.classList.add('active');
                    }
                });
            }
            
            // Scroll event listener
            window.addEventListener('scroll', () => {
                updateActiveSection();
            });
            
            // Initial check
            updateActiveSection();
        }
        
        // Global scroll to section function
        window.scrollToSection = function(sectionId) {
            const section = document.getElementById(sectionId);
            if (section) {
                section.scrollIntoView({ 
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        }
        
        // Initialize page enhancements immediately.
        requestAnimationFrame(() => {
            initSectionNavigation();
            initHeroEnhancements(); // Add hero enhancements
            initLazyLoading(); // Add lazy loading
            initAccessibilityEnhancements(); // Add a11y features
            initPerformanceOptimizations(); // Add performance features
        });
        
        // Lazy Loading Implementation
        function initLazyLoading() {
            // Image lazy loading with intersection observer
            const lazyImages = document.querySelectorAll('img[data-src], img.lazy-load');
            
            if ('IntersectionObserver' in window) {
                const imageObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            
                            // Load the image
                            if (img.dataset.src) {
                                img.src = img.dataset.src;
                                img.removeAttribute('data-src');
                            }
                            
                            // Add fade-in animation
                            img.style.opacity = '0';
                            img.style.transition = 'opacity 0.3s ease';
                            
                            img.onload = () => {
                                img.style.opacity = '1';
                                img.classList.remove('lazy-load');
                            };
                            
                            // Stop observing this image
                            observer.unobserve(img);
                        }
                    });
                }, {
                    root: null,
                    rootMargin: '50px 0px', // Start loading 50px before entering viewport
                    threshold: 0.1
                });

                lazyImages.forEach(img => imageObserver.observe(img));
            } else {
                // Fallback for browsers without IntersectionObserver
                lazyImages.forEach(img => {
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                    }
                });
            }
        }
        
        // Accessibility Enhancements
        function initAccessibilityEnhancements() {
            // Add skip-to-content link
            const skipLink = document.createElement('a');
            skipLink.href = '#main-content';
            skipLink.textContent = 'Skip to main content';
            skipLink.className = 'sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-50 focus:bg-blue-600 focus:text-white focus:px-4 focus:py-2 focus:rounded';
            skipLink.style.cssText = `
                position: absolute;
                left: -10000px;
                width: 1px;
                height: 1px;
                overflow: hidden;
            `;
            skipLink.addEventListener('focus', () => {
                skipLink.style.cssText = `
                    position: fixed;
                    top: 1rem;
                    left: 1rem;
                    z-index: 9999;
                    background: #2563eb;
                    color: white;
                    padding: 0.5rem 1rem;
                    border-radius: 0.375rem;
                    text-decoration: none;
                    font-weight: 600;
                `;
            });
            skipLink.addEventListener('blur', () => {
                skipLink.style.cssText = `
                    position: absolute;
                    left: -10000px;
                    width: 1px;
                    height: 1px;
                    overflow: hidden;
                `;
            });
            document.body.insertBefore(skipLink, document.body.firstChild);
            
            // Enhanced focus management for mobile menu
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            
            if (mobileMenuBtn && mobileMenu) {
                mobileMenuBtn.addEventListener('click', () => {
                    const isExpanded = mobileMenuBtn.getAttribute('aria-expanded') === 'true';
                    mobileMenuBtn.setAttribute('aria-expanded', !isExpanded);
                    
                    // Focus management for mobile menu
                    if (!isExpanded) {
                        // Menu is opening - focus first menu item after animation
                        setTimeout(() => {
                            const firstMenuItem = mobileMenu.querySelector('.mobile-menu-item');
                            if (firstMenuItem) {
                                firstMenuItem.focus();
                            }
                        }, 350);
                    }
                });
                
                // Add keyboard navigation for mobile menu items
                const menuItems = mobileMenu.querySelectorAll('.mobile-menu-item');
                menuItems.forEach((item, index) => {
                    item.addEventListener('keydown', (e) => {
                        if (e.key === 'ArrowDown') {
                            e.preventDefault();
                            const nextIndex = (index + 1) % menuItems.length;
                            menuItems[nextIndex].focus();
                        } else if (e.key === 'ArrowUp') {
                            e.preventDefault();
                            const prevIndex = index === 0 ? menuItems.length - 1 : index - 1;
                            menuItems[prevIndex].focus();
                        } else if (e.key === 'Escape') {
                            e.preventDefault();
                            toggleMobileMenu();
                            mobileMenuBtn.focus();
                        }
                    });
                });
            }
            
            // Add focus trap for modals
            const modals = document.querySelectorAll('[role="dialog"]');
            modals.forEach(modal => {
                const focusableElements = modal.querySelectorAll(
                    'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
                );
                
                if (focusableElements.length > 0) {
                    const firstFocusable = focusableElements[0];
                    const lastFocusable = focusableElements[focusableElements.length - 1];
                    
                    modal.addEventListener('keydown', (e) => {
                        if (e.key === 'Tab') {
                            if (e.shiftKey && document.activeElement === firstFocusable) {
                                e.preventDefault();
                                lastFocusable.focus();
                            } else if (!e.shiftKey && document.activeElement === lastFocusable) {
                                e.preventDefault();
                                firstFocusable.focus();
                            }
                        }
                        
                        if (e.key === 'Escape') {
                            const closeBtn = modal.querySelector('[data-dismiss="modal"], .close-modal');
                            if (closeBtn) closeBtn.click();
                        }
                    });
                }
            });
            
            // Reduce motion for users who prefer it
            if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                const style = document.createElement('style');
                style.textContent = `
                    *, *::before, *::after {
                        animation-duration: 0.01ms !important;
                        animation-iteration-count: 1 !important;
                        transition-duration: 0.01ms !important;
                        scroll-behavior: auto !important;
                    }
                `;
                document.head.appendChild(style);
            }
        }
        
        // Performance Optimizations
        function initPerformanceOptimizations() {
            // Debounced scroll handler
            let scrollTimeout;
            const handleScroll = () => {
                if (scrollTimeout) {
                    cancelAnimationFrame(scrollTimeout);
                }
                scrollTimeout = requestAnimationFrame(() => {
                    updateActiveNavLink();
                });
            };
            
            window.addEventListener('scroll', handleScroll, { passive: true });
            
            // Optimize animations based on device capabilities
            const isLowEndDevice = navigator.hardwareConcurrency && navigator.hardwareConcurrency <= 2;
            const hasSlowConnection = navigator.connection && 
                (navigator.connection.effectiveType === 'slow-2g' || 
                 navigator.connection.effectiveType === '2g');
            
            if (isLowEndDevice || hasSlowConnection) {
                // Reduce animation complexity for low-end devices
                const style = document.createElement('style');
                style.textContent = `
                    .floating-shape, .light-ray, .particle {
                        display: none !important;
                    }
                    .animate-pulse, .animate-bounce {
                        animation: none !important;
                    }
                    #vanta-bg {
                        display: none !important;
                    }
                `;
                document.head.appendChild(style);
            }
            
            // Preload critical resources
            const preloadLink = document.createElement('link');
            preloadLink.rel = 'preload';
            preloadLink.href = 'assets/photos/robot-rev.png';
            preloadLink.as = 'image';
            document.head.appendChild(preloadLink);
            
            // Service Worker registration for caching (if available)
            if ('serviceWorker' in navigator) {
                navigator.serviceWorker.register('/sw.js').catch(() => {
                    // Service worker not available, continue without it
                });
            }
        }
        
        // Enhanced Hero Effects
        function initHeroEnhancements() {
            
            // Counter Animation with Intersection Observer
            animateCountersOnScroll();
            
            // Typing Effect
            startTypingAnimation();
            
            // Initialize hero fade-in animations
            const heroElements = document.querySelectorAll('#home .animate-fadeIn');
            heroElements.forEach((element, index) => {
                element.style.animationDelay = `${0.5 + index * 0.2}s`;
            });
        }

        // Optimized Counter Animation with Intersection Observer
        function animateCountersOnScroll() {
            const counters = document.querySelectorAll('.counter-number');
            
            const observerOptions = {
                threshold: 0.5,
                rootMargin: '0px 0px -50px 0px'
            };

            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counter = entry.target;
                        const target = parseInt(counter.dataset.target);
                        const duration = 2000; // 2 seconds
                        const startTime = performance.now();

                        const animateCounter = (currentTime) => {
                            const elapsed = currentTime - startTime;
                            const progress = Math.min(elapsed / duration, 1);
                            
                            // Easing function for smooth animation
                            const easeOutQuart = 1 - Math.pow(1 - progress, 4);
                            const current = Math.floor(target * easeOutQuart);
                            
                            counter.textContent = current;
                            
                            if (progress < 1) {
                                requestAnimationFrame(animateCounter);
                            } else {
                                counter.textContent = target;
                            }
                        };

                        requestAnimationFrame(animateCounter);
                        counterObserver.unobserve(counter);
                    }
                });
            }, observerOptions);

            counters.forEach(counter => {
                counterObserver.observe(counter);
            });
        }

        // Typing Animation
        function startTypingAnimation() {
            const typingElement = document.querySelector('#typed-text');
            if (!typingElement) return;

            const texts = [
                'DIGITAL  SOLUTIONS',
                'AI  INNOVATIONS',
                'SMART  TECHNOLOGY',
                'FUTURE  SYSTEMS'
            ];
            
            let textIndex = 0;
            let charIndex = 0;
            let isDeleting = false;
            const typingSpeed = 150;
            const deletingSpeed = 75;
            const pauseTime = 2000;

            function typeWriter() {
                const currentText = texts[textIndex];
                
                if (isDeleting) {
                    typingElement.textContent = currentText.substring(0, charIndex - 1);
                    charIndex--;
                } else {
                    typingElement.textContent = currentText.substring(0, charIndex + 1);
                    charIndex++;
                }

                let speed = isDeleting ? deletingSpeed : typingSpeed;

                if (!isDeleting && charIndex === currentText.length) {
                    speed = pauseTime;
                    isDeleting = true;
                } else if (isDeleting && charIndex === 0) {
                    isDeleting = false;
                    textIndex = (textIndex + 1) % texts.length;
                }

                setTimeout(typeWriter, speed);
            }

            // Start typing animation after a delay
            setTimeout(typeWriter, 2000);
        }
    </script>

    <!-- Dynamic Testimonials System -->
    <script>
        // Testimonials Data
        const testimonialsData = [
            {
                id: 1,
                name: "WIDIYA MAHATI",
                position: "HR HEAD PT MITRA TRANSAKSI INDONESIA",
                initials: "WM",
                quote: "Selama bekerja sama selama 4 tahun terakhir ini kami melihat bahwa pelatihan / program yang diberikan Prosigmaka itu mendukung oprasional / bisnis Yokke, memberikan kontribusi positif dalam artian program-program itu sesuai dengan apa yang di inginkan Yokke. Kami beraharp kerjasamanya bisa berlanjut terus.",
                borderColor: "border-cyan-500/60",
                hoverColor: "hover:border-cyan-400",
                shadowColor: "hover:shadow-[0_0_20px_rgba(0,212,255,0.3)]",
                iconColor: "#00d4ff",
                gradientFrom: "from-cyan-400",
                gradientTo: "to-blue-500",
                textColor: "text-cyan-400"
            },
            {
                id: 2,
                name: "ANDREW TASIDJAWA",
                position: "HEAD BACKEND DEVELOPMENT PT MITRA TRANSAKSI INDONESIA",
                initials: "AT",
                quote: "Pengalaman bekerja sama dengan Prosigmaka sangat positif ya, dari MTI merasa kandidat yang diberikan PT Pro Sigmaka Mandiri sangat cocok ya serta dukungan service aftersalesnya bagus dari prosigmaka dan Sangat puas dengan pelayanannya.",
                borderColor: "border-purple-500/60",
                hoverColor: "hover:border-purple-400",
                shadowColor: "hover:shadow-[0_0_20px_rgba(192,132,252,0.3)]",
                iconColor: "#c084fc",
                gradientFrom: "from-purple-400",
                gradientTo: "to-pink-500",
                textColor: "text-purple-400"
            },
            {
                id: 3,
                name: "ANDREAS EIRISON",
                position: "PT KARYAPUTRA SURYAGEMILANG",
                initials: "AE",
                quote: "Saya merasa puas dengan training yang diberikan, dikarenakan materinya secara lebih terstuktur dan disampakan dengan jelas. selain itu instuktur yang mengajar juga memiliki kopetensi dibidangnya. saya beserta tim merasa terbantu karena materi yang diberkan sangat relevan dengan apa yang kami hadapi sehari hari didalam pekerjaan.",
                borderColor: "border-green-500/60",
                hoverColor: "hover:border-green-400",
                shadowColor: "hover:shadow-[0_0_20px_rgba(16,185,129,0.3)]",
                iconColor: "#10b981",
                gradientFrom: "from-green-400",
                gradientTo: "to-emerald-500",
                textColor: "text-green-400"
            }
        ];

        // Function to create testimonial HTML
        function createTestimonialHTML(testimonial) {
            return `
                <div class="testimonial-card flex-none w-[280px] sm:w-[350px] md:w-[400px] lg:w-[450px]">
                    <div class="relative bg-gradient-to-br from-gray-900 to-gray-800 border-2 ${testimonial.borderColor} rounded-2xl p-4 sm:p-5 ${testimonial.hoverColor} ${testimonial.shadowColor} transition-all duration-300 min-h-[240px] sm:min-h-[260px] md:min-h-[280px] flex flex-col justify-between">
                        <!-- Quote Icon -->
                        <div class="absolute top-3 right-4 opacity-30">
                            <svg width="30" height="30" class="sm:w-[35px] sm:h-[35px] md:w-[40px] md:h-[40px]" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z" fill="${testimonial.iconColor}"/>
                            </svg>
                        </div>
                        <div class="relative z-10 flex-1">
                            <blockquote class="text-white text-sm sm:text-base leading-relaxed mb-3 sm:mb-4 pr-8">
                                "${testimonial.quote}"
                            </blockquote>
                        </div>
                        <div class="flex items-center space-x-2 sm:space-x-3 mt-auto">
                            <div class="w-8 h-8 sm:w-10 sm:h-10 shrink-0 bg-gradient-to-br ${testimonial.gradientFrom} ${testimonial.gradientTo} rounded-full flex items-center justify-center text-xs sm:text-sm font-bold">
                                ${testimonial.initials}
                            </div>
                            <div>
                                <h4 class="text-white font-bold text-xs sm:text-sm">${testimonial.name}</h4>
                                <p class="${testimonial.textColor} font-medium text-xs">${testimonial.position}</p>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }

        // Function to generate testimonials with perfect seamless loop
        function generateTestimonials() {
            const container = document.getElementById('testimonials-track');
            if (!container) return;

            let html = '';
            
            // Generate testimonials 3 times for seamless infinite scroll
            for (let i = 0; i < 3; i++) {
                testimonialsData.forEach(testimonial => {
                    html += createTestimonialHTML(testimonial);
                });
            }
            
            container.innerHTML = html;
            
            // Update CSS animation based on actual number of testimonials
            updateTestimonialAnimation();
        }

        // Function to update CSS animation for responsive design
        function updateTestimonialAnimation() {
            const style = document.createElement('style');
            style.textContent = `
                @keyframes infiniteSlide {
                    0% {
                        transform: translateX(0);
                    }
                    100% {
                        transform: translateX(calc(-284px * ${testimonialsData.length})); /* Mobile: 280px width + 4px gap */
                    }
                }

                @media (min-width: 640px) {
                    @keyframes infiniteSlide {
                        0% {
                            transform: translateX(0);
                        }
                        100% {
                            transform: translateX(calc(-356px * ${testimonialsData.length})); /* SM: 350px width + 6px gap */
                        }
                    }
                }

                @media (min-width: 768px) {
                    @keyframes infiniteSlide {
                        0% {
                            transform: translateX(0);
                        }
                        100% {
                            transform: translateX(calc(-406px * ${testimonialsData.length})); /* MD: 400px width + 6px gap */
                        }
                    }
                }

                @media (min-width: 1024px) {
                    @keyframes infiniteSlide {
                        0% {
                            transform: translateX(0);
                        }
                        100% {
                            transform: translateX(calc(-456px * ${testimonialsData.length})); /* LG: 450px width + 6px gap */
                        }
                    }
                }
            `;
            document.head.appendChild(style);
        }

        // Function to equalize testimonial card heights
        function equalizeTestimonialHeights() {
            // Wait for DOM to be fully rendered
            setTimeout(() => {
                const testimonialCards = document.querySelectorAll('.testimonial-card > div');
                if (testimonialCards.length === 0) return;

                // Reset heights first
                testimonialCards.forEach(card => {
                    card.style.height = 'auto';
                });

                // Get all unique testimonials (excluding duplicates from infinite scroll)
                const uniqueCards = Array.from(testimonialCards).slice(0, testimonialsData.length);
                
                // Calculate the maximum height needed
                let maxHeight = 0;
                uniqueCards.forEach(card => {
                    const cardHeight = card.offsetHeight;
                    if (cardHeight > maxHeight) {
                        maxHeight = cardHeight;
                    }
                });

                // Apply the maximum height to all cards (including duplicates)
                testimonialCards.forEach(card => {
                    card.style.height = `${maxHeight}px`;
                });

                // Responsive height adjustments
                const handleResize = () => {
                    // Reset heights
                    testimonialCards.forEach(card => {
                        card.style.height = 'auto';
                    });

                    // Recalculate maximum height
                    let newMaxHeight = 0;
                    uniqueCards.forEach(card => {
                        const cardHeight = card.offsetHeight;
                        if (cardHeight > newMaxHeight) {
                            newMaxHeight = cardHeight;
                        }
                    });

                    // Reapply equalized height
                    testimonialCards.forEach(card => {
                        card.style.height = `${newMaxHeight}px`;
                    });
                };

                // Add resize listener with debouncing
                let resizeTimeout;
                window.addEventListener('resize', () => {
                    clearTimeout(resizeTimeout);
                    resizeTimeout = setTimeout(handleResize, 250);
                });
            }, 100);
        }
    </script>

    <!-- Initialize Hexagonal Services Animation -->
    <script>
        // Initialize scroll enhancements when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            initializeScrollEnhancements();
            initializeHexagonalServices();
            generateTestimonials(); // Generate dynamic testimonials
            equalizeTestimonialHeights(); // Equalize card heights
            initializeServiceCards(); // Add new function call
        });
        
        // Square Services Functionality
        function initializeHexagonalServices() {
            const serviceCards = document.querySelectorAll('.service-card-large');
            const detailsPanel = document.getElementById('service-details');
            const detailsBody = document.getElementById('details-body');
            const closeButton = document.querySelector('.close-details');
            
            // Early return if elements don't exist (for different layouts)
            if (!serviceCards.length || !detailsPanel || !detailsBody) {
                return;
            }
            
            // Service data
            const serviceData = {
                professional: {
                    title: 'PROFESSIONAL SERVICES',
                    icon: 'M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6z',
                    description: 'Comprehensive IT consulting and strategic technology services to optimize your business operations, enhance efficiency, and drive digital transformation initiatives.',
                    features: ['IT Strategy & Digital Transformation', 'Enterprise Architecture & Design', 'Cloud Migration & Modernization', 'Technology Assessment & Audit'],
                    color: 'blue'
                },
                headhunting: {
                    title: 'HEAD HUNTING',
                    icon: 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                    description: 'Professional talent acquisition services specializing in sourcing top-tier IT professionals and technical experts for strategic positions within your organization.',
                    features: ['Executive Search & Leadership Roles', 'Technical Specialist Recruitment', 'IT Professional Staffing Solutions', 'Contract & Permanent Placements'],
                    color: 'purple'
                },
                ai: {
                    title: 'AI SOLUTIONS',
                    icon: 'M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z',
                    description: 'Advanced artificial intelligence and machine learning solutions designed to automate processes, enhance decision-making, and drive intelligent business transformation.',
                    features: ['Machine Learning Implementation', 'Predictive Analytics & Forecasting', 'Process Automation & Optimization', 'AI Model Development & Deployment'],
                    color: 'orange'
                },
                lxp: {
                    title: 'LEARNING PLATFORM',
                    icon: 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253',
                    description: 'Modern Learning Experience Platform (LXP) that delivers personalized, engaging, and effective learning experiences to enhance workforce capabilities and organizational performance.',
                    features: ['Personalized Learning Experiences', 'Interactive Content Management', 'Skills Tracking & Analytics', 'Certification & Assessment Tools'],
                    color: 'indigo'
                },
                training: {
                    title: 'CORPORATE TRAINING',
                    icon: 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z',
                    description: 'Comprehensive corporate training programs designed to upskill your workforce with the latest technologies, methodologies, and industry best practices.',
                    features: ['Custom Training Curriculum', 'Expert Technical Instructors', 'Hands-on Practical Workshops', 'Industry Certification Programs'],
                    color: 'yellow'
                }
            };
            
            // Add click handlers to cards
            serviceCards.forEach(card => {
                card.addEventListener('click', () => {
                    const serviceType = card.getAttribute('data-service');
                    const service = serviceData[serviceType];
                    
                    if (service) {
                        showServiceDetails(service);
                    }
                });
            });
            
            // Close panel handlers (only if elements exist)
            if (closeButton) {
                closeButton.addEventListener('click', hideServiceDetails);
            }
            
            if (detailsPanel) {
                detailsPanel.addEventListener('click', (e) => {
                    if (e.target === detailsPanel) {
                        hideServiceDetails();
                    }
                });
            }
            
            function showServiceDetails(service) {
                if (!detailsBody || !detailsPanel) return;
                
                const colorClasses = {
                    blue: 'text-blue-400 border-blue-400/30',
                    purple: 'text-purple-400 border-purple-400/30',
                    emerald: 'text-emerald-400 border-emerald-400/30',
                    orange: 'text-orange-400 border-orange-400/30',
                    indigo: 'text-indigo-400 border-indigo-400/30',
                    yellow: 'text-yellow-400 border-yellow-400/30'
                };
                
                const colorClass = colorClasses[service.color] || 'text-blue-400 border-blue-400/30';
                
                detailsBody.innerHTML = `
                    <div class="text-center mb-8">
                        <div class="w-20 h-20 mx-auto bg-gradient-to-br from-${service.color}-500/20 to-${service.color}-600/20 rounded-full flex items-center justify-center mb-4 ${colorClass.split(' ')[1]}">
                            <svg class="w-10 h-10 ${colorClass.split(' ')[0]}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="${service.icon}"></path>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-bold text-white mb-4">${service.title}</h2>
                        <p class="text-gray-300 text-lg leading-relaxed">${service.description}</p>
                    </div>
                    
                    <div class="mb-8">
                        <h3 class="text-xl font-semibold text-white mb-4">Key Features:</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            ${service.features.map(feature => `
                                <div class="flex items-center p-3 bg-gray-800/50 rounded-lg border ${colorClass.split(' ')[1]}">
                                    <div class="w-2 h-2 bg-${service.color}-400 rounded-full mr-3"></div>
                                    <span class="text-gray-200">${feature}</span>
                                </div>
                            `).join('')}
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <button class="bg-gradient-to-r from-${service.color}-500 to-${service.color}-600 hover:from-${service.color}-600 hover:to-${service.color}-700 text-white font-semibold py-3 px-8 rounded-lg transition-all duration-300 transform hover:scale-105">
                            Get Started
                        </button>
                    </div>
                `;
                
                detailsPanel.classList.add('active');
            }
            
            function hideServiceDetails() {
                if (detailsPanel) {
                    detailsPanel.classList.remove('active');
                }
            }
        }

        // New Service Cards Functionality for Current Layout
        function initializeServiceCards() {
            const serviceCards = document.querySelectorAll('.service-card-futuristic[data-service]');
            const serviceTitle = document.getElementById('service-title');
            const serviceDescription = document.getElementById('service-description');
            const serviceFeatures = document.getElementById('service-features');
            
            // Service data for current services
            const currentServiceData = {
                professional: {
                    title: 'PROFESSIONAL <span class="bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-600 bg-clip-text text-transparent text-glow">SERVICES</span>',
                    description: 'Strategic IT consulting and comprehensive technology solutions designed to <span class="text-cyan-400 font-semibold">optimize your business operations</span> and accelerate <span class="text-gradient-bold">digital transformation</span> initiatives across your organization.',
                    features: [
                        { color: 'from-cyan-400 to-blue-500', text: 'IT strategy consultation and digital transformation roadmap' },
                        { color: 'from-blue-500 to-purple-600', text: 'Enterprise architecture design and system optimization' },
                        { color: 'from-purple-600 to-cyan-500', text: 'Cloud migration services and infrastructure modernization' },
                        { color: 'from-cyan-500 to-blue-400', text: 'Technology assessment, audit, and performance analysis' }
                    ]
                },
                headhunting: {
                    title: 'HEAD <span class="bg-gradient-to-r from-purple-400 via-pink-500 to-red-600 bg-clip-text text-transparent text-glow">HUNTING</span>',
                    description: 'Professional talent acquisition and executive search services that connect you with <span class="text-purple-400 font-semibold">top-tier IT professionals</span> and technical experts for <span class="text-gradient-bold">strategic positions</span> within your organization.',
                    features: [
                        { color: 'from-purple-400 to-pink-500', text: 'Executive search and leadership role recruitment' },
                        { color: 'from-pink-500 to-red-600', text: 'Technical specialist sourcing and IT talent acquisition' },
                        { color: 'from-red-600 to-purple-500', text: 'Specialized recruitment for emerging technology roles' },
                        { color: 'from-purple-500 to-pink-400', text: 'Comprehensive candidate assessment and screening process' }
                    ]
                },
                ai: {
                    title: 'AI <span class="bg-gradient-to-r from-orange-400 via-red-500 to-pink-600 bg-clip-text text-transparent text-glow">SOLUTIONS</span>',
                    description: 'Advanced artificial intelligence and machine learning solutions that <span class="text-orange-400 font-semibold">automate complex processes</span> and deliver <span class="text-gradient-bold">intelligent business insights</span> to drive competitive advantage.',
                    features: [
                        { color: 'from-orange-400 to-red-500', text: 'Machine learning model development and implementation' },
                        { color: 'from-red-500 to-pink-600', text: 'Intelligent process automation and workflow optimization' },
                        { color: 'from-pink-600 to-orange-500', text: 'Predictive analytics and advanced data intelligence platforms' },
                        { color: 'from-orange-500 to-red-400', text: 'AI model deployment, monitoring, and performance optimization' }
                    ]
                },
                lxp: {
                    title: 'LEARNING <span class="bg-gradient-to-r from-indigo-400 via-purple-500 to-violet-600 bg-clip-text text-transparent text-glow">PLATFORM</span>',
                    description: 'Modern Learning Experience Platform (LXP) that enables <span class="text-indigo-400 font-semibold">personalized skill development</span> and drives <span class="text-gradient-bold">organizational learning transformation</span> through innovative digital experiences.',
                    features: [
                        { color: 'from-indigo-400 to-purple-500', text: 'Personalized learning journeys and adaptive pathways' },
                        { color: 'from-purple-500 to-violet-600', text: 'Interactive content creation and multimedia learning delivery' },
                        { color: 'from-violet-600 to-indigo-500', text: 'Real-time progress tracking and comprehensive analytics' },
                        { color: 'from-indigo-500 to-purple-400', text: 'Skills assessment tools and certification management system' }
                    ]
                },
                training: {
                    title: 'CORPORATE <span class="bg-gradient-to-r from-yellow-400 via-orange-500 to-amber-600 bg-clip-text text-transparent text-glow">TRAINING</span>',
                    description: 'Comprehensive corporate training programs designed to <span class="text-yellow-400 font-semibold">upskill your workforce</span> with cutting-edge technologies and ensure successful <span class="text-gradient-bold">technology adoption</span> across your organization.',
                    features: [
                        { color: 'from-yellow-400 to-orange-500', text: 'Custom training curriculum development and delivery' },
                        { color: 'from-orange-500 to-amber-600', text: 'Expert technical instructors and industry mentors' },
                        { color: 'from-amber-600 to-yellow-500', text: 'Hands-on practical workshops and laboratory sessions' },
                        { color: 'from-yellow-500 to-orange-400', text: 'Professional certification support and assessment programs' }
                    ]
                }
            };

            // Add click handlers to service cards
            serviceCards.forEach(card => {
                // Mouse click handler
                card.addEventListener('click', () => {
                    const serviceType = card.getAttribute('data-service');
                    const service = currentServiceData[serviceType];
                    
                    if (service) {
                        updateServiceDetails(service);
                        
                        // Add visual feedback - briefly highlight clicked card
                        card.style.transform = 'scale(0.95)';
                        setTimeout(() => {
                            card.style.transform = '';
                        }, 150);

                        // Remove active state from all cards
                        serviceCards.forEach(c => c.classList.remove('service-active'));
                        // Add active state to clicked card
                        card.classList.add('service-active');
                    }
                });

                // Keyboard event handler
                card.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        card.click();
                    }
                });

                // Add hover effect enhancement
                card.addEventListener('mouseenter', () => {
                    card.style.zIndex = '10';
                });

                card.addEventListener('mouseleave', () => {
                    card.style.zIndex = '';
                });

                // Focus enhancement
                card.addEventListener('focus', () => {
                    card.style.outline = '2px solid #06b6d4';
                    card.style.outlineOffset = '2px';
                });

                card.addEventListener('blur', () => {
                    card.style.outline = '';
                    card.style.outlineOffset = '';
                });
            });

            // Add click handlers to mobile service icons
            const mobileServiceIcons = document.querySelectorAll('.service-icon-mobile[data-service]');
            mobileServiceIcons.forEach(icon => {
                icon.addEventListener('click', () => {
                    const serviceType = icon.getAttribute('data-service');
                    const service = currentServiceData[serviceType];
                    
                    if (service) {
                        updateServiceDetails(service);
                        
                        // Add visual feedback for mobile icons
                        const iconCircle = icon.querySelector('div');
                        iconCircle.style.transform = 'scale(0.9)';
                        setTimeout(() => {
                            iconCircle.style.transform = '';
                        }, 150);

                        // Remove active state from all mobile icons
                        mobileServiceIcons.forEach(i => i.classList.remove('service-active'));
                        // Add active state to clicked icon
                        icon.classList.add('service-active');
                        
                        // Also sync with desktop cards
                        serviceCards.forEach(c => c.classList.remove('service-active'));
                        const correspondingCard = document.querySelector(`.service-card-futuristic[data-service="${serviceType}"]`);
                        if (correspondingCard) {
                            correspondingCard.classList.add('service-active');
                        }
                    }
                });

                // Add hover effect for mobile icons
                icon.addEventListener('mouseenter', () => {
                    const iconCircle = icon.querySelector('div');
                    iconCircle.style.zIndex = '10';
                });

                icon.addEventListener('mouseleave', () => {
                    const iconCircle = icon.querySelector('div');
                    iconCircle.style.zIndex = '';
                });
            });

            function updateServiceDetails(service) {
                // Get current service type from the title
                let serviceType = 'professional'; // default
                if (service.title.includes('HEAD')) serviceType = 'headhunting';
                else if (service.title.includes('AI ')) serviceType = 'ai';
                else if (service.title.includes('LEARNING')) serviceType = 'lxp';
                else if (service.title.includes('CORPORATE')) serviceType = 'training';
                
                // Update title with animation and dynamic glow
                serviceTitle.style.opacity = '0';
                serviceTitle.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    serviceTitle.innerHTML = service.title;
                    // Apply dynamic glow effect using CSS classes
                    const glowSpan = serviceTitle.querySelector('.text-glow');
                    if (glowSpan) {
                        // Remove all existing glow classes
                        glowSpan.classList.remove('glow-professional', 'glow-headhunting', 'glow-ai', 'glow-lxp', 'glow-training');
                        // Add the appropriate glow class
                        glowSpan.classList.add(`glow-${serviceType}`);
                    }
                    serviceTitle.style.opacity = '1';
                    serviceTitle.style.transform = 'translateY(0)';
                }, 200);

                // Update description with animation
                setTimeout(() => {
                    serviceDescription.style.opacity = '0';
                    serviceDescription.style.transform = 'translateY(20px)';
                    
                    setTimeout(() => {
                        serviceDescription.innerHTML = service.description;
                        serviceDescription.style.opacity = '1';
                        serviceDescription.style.transform = 'translateY(0)';
                    }, 100);
                }, 150);

                // Update features with staggered animation
                setTimeout(() => {
                    serviceFeatures.style.opacity = '0';
                    serviceFeatures.style.transform = 'translateY(20px)';
                    
                    setTimeout(() => {
                        const featuresHTML = service.features.map((feature, index) => `
                            <div class="flex lg:justify-start justify-center items-center text-gray-300 feature-item" style="animation-delay: ${index * 0.1}s">
                                <div class="w-2 h-2 sm:w-3 sm:h-3 bg-gradient-to-r ${feature.color} rounded-full mr-3 sm:mr-4 flex-shrink-0"></div>
                                <span class="text-sm sm:text-base lg:text-lg font-medium">${feature.text}</span>
                            </div>
                        `).join('');
                        
                        serviceFeatures.innerHTML = featuresHTML;
                        serviceFeatures.style.opacity = '1';
                        serviceFeatures.style.transform = 'translateY(0)';
                    }, 100);
                }, 300);
            }

            // Add CSS for smooth transitions
            const serviceTransitionStyles = document.createElement('style');
            serviceTransitionStyles.textContent = `
                #service-title, #service-description, #service-features {
                    transition: opacity 0.3s ease, transform 0.3s ease;
                }
                
                .service-card-futuristic {
                    transition: transform 0.15s ease, z-index 0.15s ease;
                }
                
                .service-active {
                    transform: scale(1.02) !important;
                }

                .service-icon-mobile.service-active > div {
                    transform: scale(1.1) !important;
                    border-width: 3px !important;
                }

                .service-icon-mobile.service-active span {
                    font-weight: 700 !important;
                }
                
                .service-icon-mobile {
                    transition: all 0.3s ease;
                }

                .service-icon-mobile > div {
                    transition: all 0.3s ease;
                }
                
                .feature-item {
                    animation: slideInUp 0.6s ease forwards;
                    opacity: 0;
                    transform: translateY(20px);
                }
                
                @keyframes slideInUp {
                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }
                
                /* Dynamic Glow Classes for Services */
                .glow-professional {
                    text-shadow: 0 0 10px rgba(6, 182, 212, 0.4), 0 0 15px rgba(6, 182, 212, 0.3), 0 0 20px rgba(6, 182, 212, 0.2) !important;
                }
                
                .glow-headhunting {
                    text-shadow: 0 0 10px rgba(168, 85, 247, 0.4), 0 0 15px rgba(168, 85, 247, 0.3), 0 0 20px rgba(168, 85, 247, 0.2) !important;
                }
                
                
                .glow-ai {
                    text-shadow: 0 0 10px rgba(251, 146, 60, 0.4), 0 0 15px rgba(251, 146, 60, 0.3), 0 0 20px rgba(251, 146, 60, 0.2) !important;
                }
                
                .glow-lxp {
                    text-shadow: 0 0 10px rgba(99, 102, 241, 0.4), 0 0 15px rgba(99, 102, 241, 0.3), 0 0 20px rgba(99, 102, 241, 0.2) !important;
                }
                
                .glow-training {
                    text-shadow: 0 0 10px rgba(245, 158, 11, 0.4), 0 0 15px rgba(245, 158, 11, 0.3), 0 0 20px rgba(245, 158, 11, 0.2) !important;
                }
            `;
            document.head.appendChild(serviceTransitionStyles);

            // Don't initialize any default service - let the original content show
            // Users can click on service cards to see details
            
            // Set initial active state for first service card (but don't load its content)
            const firstDesktopCard = document.querySelector('.service-card-futuristic[data-service="professional"]');
            const firstMobileIcon = document.querySelector('.service-icon-mobile[data-service="professional"]');
        }
        
        // Enhanced scroll functionality (without indicators)
        function initializeScrollEnhancements() {
            const scrollContainer = document.querySelector('#case-study .overflow-x-auto');
            const leftArrow = document.querySelector('#case-study .scroll-hint-left');
            const rightArrow = document.querySelector('#case-study .scroll-hint-right');
            
            if (!scrollContainer) return;
            
            // Update arrow visibility based on scroll position
            function updateScrollArrows() {
                const scrollLeft = scrollContainer.scrollLeft;
                const maxScrollLeft = scrollContainer.scrollWidth - scrollContainer.clientWidth;
                
                // Hide left arrow when at start
                if (leftArrow) {
                    leftArrow.style.opacity = scrollLeft <= 10 ? '0.3' : '0.8';
                }
                
                // Hide right arrow when at end
                if (rightArrow) {
                    rightArrow.style.opacity = scrollLeft >= maxScrollLeft - 10 ? '0.3' : '0.8';
                }
            }
            
            // Add scroll event listener
            scrollContainer.addEventListener('scroll', updateScrollArrows);
            
            // Initial update
            updateScrollArrows();
            
            // Add click handlers for arrows (smooth scroll assistance)
            if (leftArrow) {
                leftArrow.addEventListener('click', () => {
                    scrollContainer.scrollBy({
                        left: -400, // Scroll left by one card width + gap
                        behavior: 'smooth'
                    });
                });
            }
            
            if (rightArrow) {
                rightArrow.addEventListener('click', () => {
                    scrollContainer.scrollBy({
                        left: 400, // Scroll right by one card width + gap
                        behavior: 'smooth'
                    });
                });
            }
            
            // Add touch/swipe support for mobile
            let isDown = false;
            let startX;
            let scrollLeftStart;
            
            scrollContainer.addEventListener('mousedown', (e) => {
                isDown = true;
                scrollContainer.style.cursor = 'grabbing';
                startX = e.pageX - scrollContainer.offsetLeft;
                scrollLeftStart = scrollContainer.scrollLeft;
            });
            
            scrollContainer.addEventListener('mouseleave', () => {
                isDown = false;
                scrollContainer.style.cursor = 'grab';
            });
            
            scrollContainer.addEventListener('mouseup', () => {
                isDown = false;
                scrollContainer.style.cursor = 'grab';
            });
            
            scrollContainer.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - scrollContainer.offsetLeft;
                const walk = (x - startX) * 2;
                scrollContainer.scrollLeft = scrollLeftStart - walk;
            });
            
            // Set initial cursor style
            scrollContainer.style.cursor = 'grab';
        }
        
        // Top Navbar Control
        function initTopNavbar() {
            const navbar = document.getElementById('top-navbar');
            
            if (navbar) {
                navbar.classList.add('opacity-100');
                navbar.classList.remove('opacity-0');
            }
        }
        
        // Mobile Menu Toggle
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobile-menu');
            const menuBtn = document.getElementById('mobile-menu-btn');
            
            if (mobileMenu && menuBtn) {
                const isHidden = mobileMenu.classList.contains('hidden');
                
                if (isHidden) {
                    // Show menu
                    mobileMenu.classList.remove('hidden');
                    menuBtn.setAttribute('aria-expanded', 'true');
                    
                    // Animate menu items
                    const menuItems = mobileMenu.querySelectorAll('.mobile-menu-item');
                    menuItems.forEach((item, index) => {
                        item.style.animationDelay = `${0.1 + index * 0.05}s`;
                    });
                    
                    // Change icon to X
                    const menuIcon = menuBtn.querySelector('svg');
                    menuIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>';
                    
                    // Add backdrop click to close
                    setTimeout(() => {
                        document.addEventListener('click', handleBackdropClick);
                    }, 100);
                    
                } else {
                    // Hide menu
                    mobileMenu.classList.add('hidden');
                    menuBtn.setAttribute('aria-expanded', 'false');
                    
                    // Change icon back to hamburger
                    const menuIcon = menuBtn.querySelector('svg');
                    menuIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>';
                    
                    // Remove backdrop listener
                    document.removeEventListener('click', handleBackdropClick);
                }
            }
        }
        
        // Handle backdrop click to close mobile menu
        function handleBackdropClick(event) {
            const mobileMenu = document.getElementById('mobile-menu');
            const menuBtn = document.getElementById('mobile-menu-btn');
            
            // Check if click is outside menu and menu button
            if (mobileMenu && menuBtn && 
                !mobileMenu.contains(event.target) && 
                !menuBtn.contains(event.target)) {
                toggleMobileMenu();
            }
        }
        
        // Handle escape key to close mobile menu
        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                const mobileMenu = document.getElementById('mobile-menu');
                if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                    toggleMobileMenu();
                }
            }
        });
        
        // Initialize mobile menu button
        function initMobileMenu() {
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            if (mobileMenuBtn) {
                mobileMenuBtn.addEventListener('click', toggleMobileMenu);
            }
        }
        
        // Update active nav link based on current section
        function updateActiveNavLink() {
            const sections = window.prosigmakaSectionIds || ['home', 'clients', 'services', 'ai-agent', 'case-study'];
            const navLinks = document.querySelectorAll('.nav-link');
            const footer = document.getElementById('footer');
            
            let currentSection = '';
            let isInFooter = false;
            
            // Check if footer is visible in viewport
            if (footer) {
                const footerRect = footer.getBoundingClientRect();
                // If footer is significantly visible (more than 30% of viewport height)
                if (footerRect.top < window.innerHeight * 0.7) {
                    isInFooter = true;
                }
            }
            
            // Only check sections if not in footer
            if (!isInFooter) {
                for (const section of sections) {
                    const element = document.getElementById(section);
                    if (element) {
                        const rect = element.getBoundingClientRect();
                        if (rect.top <= 100 && rect.bottom >= 100) {
                            currentSection = section;
                            break;
                        }
                    }
                }
            }
            
            // Update active states
            navLinks.forEach(link => {
                const href = link.getAttribute('href').substring(1); // Remove #
                // Only add active class if not in footer and matches current section
                if (!isInFooter && href === currentSection) {
                    link.classList.add('text-white');
                    link.classList.remove('text-gray-200');
                } else {
                    link.classList.add('text-gray-200');
                    link.classList.remove('text-white');
                }
            });
        }
        
        // Add scroll listener for active nav links
        window.addEventListener('scroll', updateActiveNavLink);
        
        // Initialize navbar and mobile menu
        initTopNavbar();
        initMobileMenu();
        
        // Global toggle function for mobile menu
        window.toggleMobileMenu = toggleMobileMenu;
    </script>

    <!-- ProSigmaka AI Chat System -->
    <script src="{{ asset('assets/prosigmaka/js/script-chat-ai.js') }}?khkjkjjkj=hjhjh"></script>

    <!-- WhatsApp Float Styles (removed floating button, now integrated in chat) -->
    <style>
        
        /* Chat Animation Styles */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fadeIn {
            animation: fadeIn 0.6s ease-out forwards;
            opacity: 0;
        }
        
        /* Chat Scrollbar - Hidden */
        #chat-messages {
            -ms-overflow-style: none;  /* Internet Explorer 10+ */
            scrollbar-width: none;  /* Firefox */
        }
        
        #chat-messages::-webkit-scrollbar {
            display: none;  /* Safari and Chrome */
        }
        
        /* Enhanced backdrop blur for chat container */
        #chat-container {
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }
        
        /* Pala Decoration Animations */
        @keyframes palaFloat {
            0%, 100% {
                transform: translateY(0px) rotate(12deg);
            }
            50% {
                transform: translateY(-20px) rotate(12deg);
            }
        }
        
        @keyframes palaFloatReverse {
            0%, 100% {
                transform: translateY(0px) rotate(-12deg);
            }
            50% {
                transform: translateY(-15px) rotate(-12deg);
            }
        }
        
        @keyframes palaRotate {
            from {
                transform: translate(-50%, -50%) rotate(45deg);
            }
            to {
                transform: translate(-50%, -50%) rotate(405deg);
            }
        }
        
        /* Apply custom animations */
        .pala-float-1 {
            animation: palaFloat 6s ease-in-out infinite;
        }
        
        .pala-float-2 {
            animation: palaFloatReverse 5s ease-in-out infinite;
            animation-delay: 1s;
        }
        
        .pala-rotate {
            animation: palaRotate 60s linear infinite;
        }
        
        /* Responsive Pala Images */
        @media (max-width: 768px) {
            .pala-decoration {
                opacity: 0.05 !important;
            }
            
            .pala-decoration img {
                max-width: 80px !important;
                max-height: 80px !important;
            }
        }

        /* Theme Toggle */
        .theme-icon-light {
            opacity: 0;
            transform: rotate(-90deg) scale(0.6);
        }

        html[data-theme="light"] .theme-icon-dark {
            opacity: 0;
            transform: rotate(90deg) scale(0.6);
        }

        html[data-theme="light"] .theme-icon-light {
            opacity: 1;
            transform: rotate(0deg) scale(1);
        }

        html[data-theme="light"] body {
            background: #f7f4ee !important;
            color: #253244 !important;
        }

        html[data-theme="light"] .fullpage-section {
            background-color: #f7f4ee !important;
        }

        html[data-theme="light"] #home .absolute.inset-0.bg-gradient-to-br,
        html[data-theme="light"] #clients .absolute.inset-0.bg-gradient-to-br,
        html[data-theme="light"] #services,
        html[data-theme="light"] #case-study .absolute.inset-0.bg-gradient-to-br,
        html[data-theme="light"] #ai-agent .absolute.inset-0.bg-gradient-to-br,
        html[data-theme="light"] #blog,
        html[data-theme="light"] footer {
            background: #f7f4ee !important;
        }

        html[data-theme="light"] #vanta-bg,
        html[data-theme="light"] .light-ray,
        html[data-theme="light"] .particle,
        html[data-theme="light"] .scan-line,
        html[data-theme="light"] .pala-decoration,
        html[data-theme="light"] .pala-rotate {
            opacity: 0.045 !important;
            filter: none !important;
        }

        html[data-theme="light"] .animate-ping,
        html[data-theme="light"] .animate-pulse {
            animation: none !important;
        }

        html[data-theme="light"] .grid-pattern {
            opacity: 0.07 !important;
            animation: none !important;
        }

        html[data-theme="light"] #home .absolute.inset-0.bg-black\/15,
        html[data-theme="light"] footer .absolute.inset-0.bg-gradient-to-t {
            background: rgba(250, 247, 241, 0.44) !important;
        }

        html[data-theme="light"] .text-white,
        html[data-theme="light"] h1,
        html[data-theme="light"] h2,
        html[data-theme="light"] h3,
        html[data-theme="light"] h4,
        html[data-theme="light"] h5 {
            color: #253244 !important;
        }

        html[data-theme="light"] .text-gray-500,
        html[data-theme="light"] .text-gray-400,
        html[data-theme="light"] .text-gray-300,
        html[data-theme="light"] .text-gray-200,
        html[data-theme="light"] .text-slate-400,
        html[data-theme="light"] .text-slate-300,
        html[data-theme="light"] .text-slate-200 {
            color: #637083 !important;
        }

        html[data-theme="light"] .text-cyan-400,
        html[data-theme="light"] .text-cyan-300,
        html[data-theme="light"] .text-blue-400,
        html[data-theme="light"] .text-purple-400,
        html[data-theme="light"] .text-orange-400,
        html[data-theme="light"] .text-orange-300 {
            color: #3b7890 !important;
        }

        html[data-theme="light"] .bg-clip-text.text-transparent,
        html[data-theme="light"] .text-gradient-fire {
            background: none !important;
            -webkit-background-clip: text !important;
            background-clip: text !important;
            color: #3b7890 !important;
        }

        html[data-theme="light"] .text-bold-shadow,
        html[data-theme="light"] .hero-subtitle-shadow,
        html[data-theme="light"] .text-glow,
        html[data-theme="light"] .hero-gradient-shadow,
        html[data-theme="light"] .text-gradient-fire {
            filter: none !important;
            text-shadow: none !important;
        }

        html[data-theme="light"] .bg-gray-950,
        html[data-theme="light"] .bg-gray-900,
        html[data-theme="light"] .bg-gray-800,
        html[data-theme="light"] .bg-slate-950,
        html[data-theme="light"] .bg-black\/40,
        html[data-theme="light"] .bg-white\/5,
        html[data-theme="light"] .bg-blue-500\/10,
        html[data-theme="light"] .bg-purple-900\/50,
        html[data-theme="light"] .bg-gray-800\/50 {
            background-color: rgba(252, 250, 245, 0.9) !important;
        }

        html[data-theme="light"] .border-gray-700,
        html[data-theme="light"] .border-gray-700\/50,
        html[data-theme="light"] .border-gray-800\/50,
        html[data-theme="light"] .border-cyan-400\/20,
        html[data-theme="light"] .border-purple-500\/40 {
            border-color: rgba(85, 104, 119, 0.18) !important;
        }

        html[data-theme="light"] .service-card-futuristic > .relative,
        html[data-theme="light"] .testimonial-card > div,
        html[data-theme="light"] .success-story-slide > div > div,
        html[data-theme="light"] #chat-container,
        html[data-theme="light"] #mobile-menu > div,
        html[data-theme="light"] .blog-card,
        html[data-theme="light"] article {
            background: rgba(252, 250, 245, 0.92) !important;
            border-color: rgba(85, 104, 119, 0.16) !important;
            box-shadow: 0 14px 34px rgba(83, 92, 101, 0.10) !important;
            backdrop-filter: none !important;
            -webkit-backdrop-filter: none !important;
        }

        html[data-theme="light"] .service-card-futuristic > .absolute,
        html[data-theme="light"] .service-card-futuristic .absolute.inset-0[class*="bg-gradient"],
        html[data-theme="light"] .absolute.inset-0[class*="bg-gradient"],
        html[data-theme="light"] .success-story-slide .absolute.inset-0[class*="blur"],
        html[data-theme="light"] .testimonial-card .absolute.inset-0[class*="blur"] {
            opacity: 0 !important;
            filter: none !important;
        }

        html[data-theme="light"] .section-nav-item {
            background: rgba(252, 250, 245, 0.94) !important;
            border-color: rgba(85, 104, 119, 0.18) !important;
            box-shadow: 0 8px 22px rgba(83, 92, 101, 0.12) !important;
        }

        html[data-theme="light"] .section-nav-item.active,
        html[data-theme="light"] .section-nav-item:hover {
            background: #3b7890 !important;
        }

        html[data-theme="light"] .section-nav-item.active .nav-icon,
        html[data-theme="light"] .section-nav-item:hover .nav-icon {
            filter: brightness(0) invert(1) !important;
        }

        html[data-theme="light"] .nav-icon {
            filter: brightness(0) saturate(100%) invert(38%) sepia(16%) saturate(1215%) hue-rotate(153deg) brightness(91%) contrast(86%) !important;
        }

        html[data-theme="light"] .theme-toggle-btn {
            background: rgba(252, 250, 245, 0.94) !important;
            border-color: rgba(183, 113, 62, 0.28) !important;
            color: #9a5932 !important;
            box-shadow: 0 8px 20px rgba(83, 92, 101, 0.12) !important;
        }

        html[data-theme="light"] img[src*="logo-prosigmaka.png"] {
            filter: drop-shadow(0 8px 18px rgba(83, 92, 101, 0.12));
        }

        html[data-theme="light"] #clients img {
            filter: brightness(0) !important;
        }

        html[data-theme="light"] .hero-robot-img {
            filter: drop-shadow(0 14px 24px rgba(83, 92, 101, 0.14)) !important;
        }

        html[data-theme="light"] input,
        html[data-theme="light"] textarea {
            background: rgba(252, 250, 245, 0.96) !important;
            color: #253244 !important;
            border-color: rgba(85, 104, 119, 0.20) !important;
        }

        html[data-theme="light"] input::placeholder,
        html[data-theme="light"] textarea::placeholder {
            color: #7a8696 !important;
        }

        html[data-theme="light"] #chat-messages {
            background: rgba(247, 244, 238, 0.76) !important;
        }

        html[data-theme="light"] [class*="shadow-cyan"],
        html[data-theme="light"] [class*="shadow-blue"],
        html[data-theme="light"] [class*="shadow-purple"],
        html[data-theme="light"] [class*="shadow-orange"] {
            box-shadow: 0 10px 24px rgba(83, 92, 101, 0.10) !important;
        }

        html[data-theme="light"] footer a:hover,
        html[data-theme="light"] .service-card-futuristic:hover {
            transform: none !important;
        }
    </style>

    <!-- Carousel Navigation Scripts -->
    <script>
        (function () {
            function applyTheme(theme) {
                const normalizedTheme = theme === 'light' ? 'light' : 'dark';
                document.documentElement.dataset.theme = normalizedTheme;
                localStorage.setItem('prosigmaka-theme', normalizedTheme);
                document.querySelectorAll('.theme-toggle-btn').forEach((button) => {
                    button.setAttribute('aria-pressed', normalizedTheme === 'light' ? 'true' : 'false');
                    button.setAttribute('title', normalizedTheme === 'light' ? 'Switch to dark theme' : 'Switch to light theme');
                });
            }

            document.addEventListener('DOMContentLoaded', function () {
                applyTheme(localStorage.getItem('prosigmaka-theme') || 'dark');
                document.querySelectorAll('.theme-toggle-btn').forEach((button) => {
                    button.addEventListener('click', function () {
                        const nextTheme = document.documentElement.dataset.theme === 'light' ? 'dark' : 'light';
                        applyTheme(nextTheme);
                    });
                });
            });
        })();

        document.addEventListener('DOMContentLoaded', function() {
            // Success Stories Carousel Navigation
            const successStoriesTrack = document.querySelector('.success-stories-track');
            const successLeftButton = document.querySelector('.success-nav-left');
            const successRightButton = document.querySelector('.success-nav-right');
            
            if (successStoriesTrack && successLeftButton && successRightButton) {
                let successCurrentIndex = 0;
                const totalSuccessStories = 3;
                
                // Responsive carousel speed adjustment
                function getCarouselSpeed() {
                    if (window.innerWidth < 640) {
                        return 8000; // Slower on mobile for better reading
                    } else if (window.innerWidth < 1024) {
                        return 7500; // Medium speed on tablet
                    } else {
                        return 7000; // Default speed on desktop
                    }
                }
                
                function updateSuccessStoriesPosition() {
                    // Calculate translate percentage based on viewport and padding/margins
                    let translatePercentage = 100; // Base percentage
                    
                    if (window.innerWidth < 640) {
                        // Ultra-mobile: 2rem padding each side + 1rem slide padding each side = 6rem total
                        // 6rem ≈ 96px on most devices, so we need to account for this
                        const paddingOffset = (4 / window.innerWidth) * 100; // Convert 4rem to percentage
                        translatePercentage = 100 + paddingOffset;
                    } else if (window.innerWidth < 768) {
                        // Mobile: 3rem padding each side + 1rem slide padding each side = 8rem total  
                        // 8rem ≈ 128px on most devices
                        const paddingOffset = (6 / window.innerWidth) * 100; // Convert 6rem to percentage
                        translatePercentage = 100 + paddingOffset;
                    }
                    // Desktop uses 100% (no additional padding adjustments needed)
                    
                    const translateX = -successCurrentIndex * translatePercentage;
                    successStoriesTrack.style.transform = `translateX(${translateX}%)`;
                    
                    // Add responsive transition duration
                    if (window.innerWidth < 640) {
                        successStoriesTrack.style.transition = 'transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
                    } else {
                        successStoriesTrack.style.transition = 'transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
                    }
                }
                
                // Auto-play success stories with responsive timing
                let successAutoPlay = setInterval(() => {
                    successCurrentIndex = (successCurrentIndex + 1) % totalSuccessStories;
                    updateSuccessStoriesPosition();
                }, getCarouselSpeed());
                
                // Set initial position
                updateSuccessStoriesPosition();
                
                // Reset autoplay on window resize and recalculate position
                window.addEventListener('resize', () => {
                    // Update position immediately when resizing
                    updateSuccessStoriesPosition();
                    
                    // Reset autoplay with new timing
                    clearInterval(successAutoPlay);
                    successAutoPlay = setInterval(() => {
                        successCurrentIndex = (successCurrentIndex + 1) % totalSuccessStories;
                        updateSuccessStoriesPosition();
                    }, getCarouselSpeed());
                });
                
                // Left button click
                successLeftButton.addEventListener('click', () => {
                    successCurrentIndex = (successCurrentIndex - 1 + totalSuccessStories) % totalSuccessStories;
                    updateSuccessStoriesPosition();
                    
                    // Reset auto-play with responsive timing
                    clearInterval(successAutoPlay);
                    successAutoPlay = setInterval(() => {
                        successCurrentIndex = (successCurrentIndex + 1) % totalSuccessStories;
                        updateSuccessStoriesPosition();
                    }, getCarouselSpeed());
                });
                
                // Right button click
                successRightButton.addEventListener('click', () => {
                    successCurrentIndex = (successCurrentIndex + 1) % totalSuccessStories;
                    updateSuccessStoriesPosition();
                    
                    // Reset auto-play with responsive timing
                    clearInterval(successAutoPlay);
                    successAutoPlay = setInterval(() => {
                        successCurrentIndex = (successCurrentIndex + 1) % totalSuccessStories;
                        updateSuccessStoriesPosition();
                    }, getCarouselSpeed());
                });
                
                // Pause auto-play on hover (desktop) and touch interactions (mobile)
                const successStoriesContainer = document.querySelector('.success-stories-carousel');
                if (successStoriesContainer) {
                    // Desktop hover events
                    successStoriesContainer.addEventListener('mouseenter', () => {
                        clearInterval(successAutoPlay);
                    });
                    
                    successStoriesContainer.addEventListener('mouseleave', () => {
                        successAutoPlay = setInterval(() => {
                            successCurrentIndex = (successCurrentIndex + 1) % totalSuccessStories;
                            updateSuccessStoriesPosition();
                        }, getCarouselSpeed());
                    });
                    
                    // Mobile touch gesture support
                    let touchStartX = 0;
                    let touchEndX = 0;
                    const minSwipeDistance = 50;
                    
                    successStoriesContainer.addEventListener('touchstart', (e) => {
                        touchStartX = e.changedTouches[0].screenX;
                        clearInterval(successAutoPlay); // Pause on touch
                    });
                    
                    successStoriesContainer.addEventListener('touchend', (e) => {
                        touchEndX = e.changedTouches[0].screenX;
                        const swipeDistance = Math.abs(touchEndX - touchStartX);
                        
                        if (swipeDistance > minSwipeDistance) {
                            if (touchEndX < touchStartX) {
                                // Swipe left - next slide
                                successCurrentIndex = (successCurrentIndex + 1) % totalSuccessStories;
                            } else {
                                // Swipe right - previous slide
                                successCurrentIndex = (successCurrentIndex - 1 + totalSuccessStories) % totalSuccessStories;
                            }
                            // Use the responsive updateSuccessStoriesPosition function
                            updateSuccessStoriesPosition();
                        }
                        
                        // Resume auto-play after touch interaction
                        setTimeout(() => {
                            successAutoPlay = setInterval(() => {
                                successCurrentIndex = (successCurrentIndex + 1) % totalSuccessStories;
                                updateSuccessStoriesPosition();
                            }, getCarouselSpeed());
                        }, 3000); // Wait 3 seconds before resuming
                    });
                }
            }

            // Infinite Testimonials Slider - Simple hover pause functionality
            const testimonialsInfiniteContainer = document.querySelector('.testimonials-infinite-container');
            const testimonialsTrack = document.querySelector('.testimonials-infinite-track');
            
            if (testimonialsInfiniteContainer && testimonialsTrack) {
                testimonialsInfiniteContainer.addEventListener('mouseenter', () => {
                    testimonialsTrack.style.animationPlayState = 'paused';
                });
                
                testimonialsInfiniteContainer.addEventListener('mouseleave', () => {
                    testimonialsTrack.style.animationPlayState = 'running';
                });
            }
        });
    </script>

</body>
</html>
