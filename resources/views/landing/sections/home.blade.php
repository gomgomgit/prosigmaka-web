<section id="home" class="fullpage-section relative overflow-hidden">
            
            <!-- Hero Content Container -->
            <div class="absolute inset-0 flex items-center justify-center">
                <!-- Enhanced Background Layers -->
                <div class="absolute inset-0 bg-gradient-to-br from-gray-900 via-blue-900/30 to-purple-900/40 z-0"></div>
                
                <!-- Dynamic Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-tr from-blue-600/20 via-transparent to-purple-600/20 animate-pulse z-0"></div>
                
                <!-- Interactive Grid Pattern -->
                <div class="absolute inset-0 opacity-[0.03] z-0 grid-pattern">
                    <div class="absolute inset-0" style="background-image: 
                        linear-gradient(rgba(0,245,255,0.1) 1px, transparent 1px),
                        linear-gradient(90deg, rgba(0,245,255,0.1) 1px, transparent 1px);
                        background-size: 50px 50px;"></div>
                </div>
                
                <!-- Dynamic Light Rays -->
                <div class="absolute inset-0 z-0">
                    <div class="light-ray ray-1"></div>
                    <div class="light-ray ray-2"></div>
                    <div class="light-ray ray-3"></div>
                    <div class="light-ray ray-4"></div>
                </div>
                
                <!-- Vanta.js NET Background -->
                <div id="vanta-bg" class="absolute inset-0 z-10"></div>
                
                <!-- Content Overlay -->
                <div class="absolute inset-0 bg-black/15 z-10"></div>

                <!-- Main Hero Content -->
                <div class="max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8 relative z-30">
                    
                    <!-- Integrated Navigation Bar -->
                    <nav id="top-navbar" class="relative z-50 opacity-100 transition-all duration-500">
                        <div class="flex items-center justify-between h-16">
                            <!-- Logo Section -->
                            <div class="relative">
                                <div class="absolute inset-0 bg-gradient-to-r from-orange-400/20 via-orange-500/20 to-orange-600/20 rounded-lg opacity-0 hover:opacity-100 transition-all duration-500"></div>
                                <img class="relative z-10 h-10 transform transition-all duration-500 ease-out hover:scale-110 hover:drop-shadow-[0_0_15px_rgba(255,165,0,0.5)] filter hover:brightness-110" 
                                    src="{{ asset('assets/prosigmaka/logo-prosigmaka.png') }}" alt="Prosigmaka Logo" />
                            </div>

                            <div class="hidden md:flex items-center">
                                <button type="button" class="theme-toggle-btn group relative h-10 w-10 rounded-full border border-cyan-400/30 bg-gray-900/60 text-cyan-200 shadow-lg shadow-cyan-500/10 transition-all duration-300 hover:scale-110 hover:border-orange-400/60 hover:text-white" aria-label="Toggle light and dark theme" title="Toggle theme">
                                    <span class="theme-icon theme-icon-dark absolute inset-0 flex items-center justify-center transition-all duration-300">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m8.66-9h-1M4.34 12h-1m15.02 6.36-.7-.7M6.34 6.34l-.7-.7m12.72 0-.7.7M6.34 17.66l-.7.7M12 8a4 4 0 100 8 4 4 0 000-8z"></path>
                                        </svg>
                                    </span>
                                    <span class="theme-icon theme-icon-light absolute inset-0 flex items-center justify-center transition-all duration-300">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                                        </svg>
                                    </span>
                                </button>
                            </div>

                            <!-- Mobile Menu Button -->
                            <div class="md:hidden flex items-center gap-3">
                                <button type="button" class="theme-toggle-btn group relative h-10 w-10 rounded-full border border-cyan-400/30 bg-gray-900/60 text-cyan-200 shadow-lg shadow-cyan-500/10 transition-all duration-300 hover:border-orange-400/60 hover:text-white" aria-label="Toggle light and dark theme" title="Toggle theme">
                                    <span class="theme-icon theme-icon-dark absolute inset-0 flex items-center justify-center transition-all duration-300">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m8.66-9h-1M4.34 12h-1m15.02 6.36-.7-.7M6.34 6.34l-.7-.7m12.72 0-.7.7M6.34 17.66l-.7.7M12 8a4 4 0 100 8 4 4 0 000-8z"></path>
                                        </svg>
                                    </span>
                                    <span class="theme-icon theme-icon-light absolute inset-0 flex items-center justify-center transition-all duration-300">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"></path>
                                        </svg>
                                    </span>
                                </button>
                                <button id="mobile-menu-btn" class="text-gray-300 hover:text-white focus:outline-none focus:text-white transition-colors duration-300" aria-label="Toggle mobile navigation menu" aria-expanded="false" aria-controls="mobile-menu">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Mobile Navigation Menu -->
                        <div id="mobile-menu" class="md:hidden hidden absolute top-full left-0 right-0 z-50 mt-2 mx-4" role="navigation" aria-label="Mobile navigation menu">
                            <div class="bg-gray-900 border border-gray-700/50 rounded-2xl shadow-2xl overflow-hidden">
                                <!-- Menu Header with Gradient -->
                                <div class="bg-gradient-to-r from-cyan-500/10 via-blue-500/10 to-purple-500/10 p-4 border-b border-gray-700/30">
                                    <div class="flex items-center justify-between">
                                        <h3 class="text-white font-semibold text-sm">Navigation Menu</h3>
                                        <div class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse"></div>
                                    </div>
                                </div>
                                
                                <!-- Menu Footer -->
                                <div class="bg-gradient-to-r from-gray-800/50 to-gray-700/50 p-3 border-t border-gray-700/30">
                                    <div class="text-center">
                                        <p class="text-gray-400 text-xs">ProSigmaka • Digital Solutions</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <!-- Hero Robot Image -->
                    <div class="absolute left-[5%] md:left-[80%] top-0 bottom-0 z-10 w-[v55w] sm:w-[45vw] md:w-[40vw] lg:w-[35vw] xl:w-[30vw] flex items-center justify-end">
                        <img 
                            src="{{ asset('assets/prosigmaka/photos/robot-rev.png') }}" 
                            alt="AI Robot - Advanced Technology representing cutting-edge artificial intelligence solutions" 
                            class="hero-robot-img w-auto h-auto min-w-[500px] sm:min-w-[600px] md:min-w-[700px] lg:min-w-[800px] xl:min-w-[950px] max-h-[130vh]"
                            style="filter: drop-shadow(0 0 40px rgba(0, 245, 255, 0.3)); object-fit: contain;"
                            loading="eager"
                            decoding="async"
                            fetchpriority="high"
                        >
                    </div>
                    
                    <!-- Hero Text Content -->
                    <div class="flex items-center min-h-[calc(100vh-64px)] relative z-20">
                        <!-- Left Column - Main Content -->
                        <div class="text-left space-y-8 max-w-[55%] sm:max-w-[60%] md:max-w-[50%] lg:max-w-[55%] xl:max-w-[60%] pr-4 sm:pr-6 md:pr-8">
                            <!-- Animated Badge -->
                            <div class="inline-flex items-center px-4 py-2 rounded-full bg-gradient-to-r from-cyan-500/20 to-blue-500/20 border border-cyan-400/30 animate-fadeIn">
                                <div class="w-2 h-2 bg-cyan-400 rounded-full mr-3 animate-pulse"></div>
                                <span class="text-cyan-400 font-medium text-sm">🚀 Built on Innovation Since 2012</span>
                            </div>
                            
                            <!-- Main Heading with Typing Effect -->
                            <h1 class="hero-title text-mega text-ultra-bold leading-tight">
                                <span class="block text-white text-bold-shadow mb-2">TRANSFORMING</span>
                                <span class="block bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-600 bg-clip-text text-transparent mb-2 hero-gradient-shadow">
                                    IDEAS INTO
                                </span>
                                <span class="block text-gradient-fire w-[100vw]">
                                    <span id="typed-text" class="inline-block whitespace-nowrap min-w-0"></span>
                                    <span class="typing-cursor">|</span>
                                </span>
                            </h1>
                            
                            <!-- Enhanced Subtitle -->
                            <p class="font-inter text-sm sm:text-md md:text-lg text-white leading-relaxed font-medium tracking-wide">
                                We are a <span class="text-gradient-bold font-bold bg-gradient-to-r from-cyan-400 to-blue-500 bg-clip-text text-transparent">professional IT consulting</span> company that provides <br> 
                                <span class="text-cyan-400 font-semibold">comprehensive technology solutions</span> 
                                to help businesses optimize <br> their digital infrastructure and achieve sustainable growth.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Scroll indicator -->
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
                <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </div>
        </section>
