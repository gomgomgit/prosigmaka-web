<section id="ai-agent" class="fullpage-section relative overflow-hidden">
            <!-- Bold Featured Background - Clean & Eye-Catching -->
            <div class="absolute inset-0 bg-gradient-to-br from-purple-900 via-indigo-900 to-blue-900"></div>
            
            <!-- Subtle Color Overlay -->
            <div class="absolute inset-0 bg-gradient-to-tr from-cyan-600/15 via-purple-600/20 to-blue-600/15"></div>
            
            <!-- Simple Glow Effects -->
            <div class="absolute top-0 left-0 w-full h-1/2 bg-gradient-to-b from-purple-500/20 via-transparent to-transparent blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-2/3 h-2/3 bg-gradient-to-t from-blue-500/15 via-transparent to-transparent blur-3xl"></div>

            <!-- Decorative Pala Images -->
            <div class="absolute inset-0 opacity-10 pointer-events-none">
                <!-- Top Right Pala -->
                <div class="absolute top-10 right-10 w-32 h-32 sm:w-48 sm:h-48 lg:w-72 lg:h-72 pala-decoration">
                    <img src="{{ asset('assets/prosigmaka/photos/pala-v2.png') }}" 
                         alt="AI Decoration" 
                         class="w-full h-full object-contain pala-float-1"
                         loading="lazy">
                </div>
            </div>
            
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                <!-- Section Header -->
                <div class="text-center mb-8 sm:mb-12">
                    <h2 class="section-title text-2xl sm:text-4xl md:text-5xl lg:text-6xl text-ultra-bold text-white mb-4 sm:mb-6 tracking-tighter leading-tight">
                        CHAT WITH OUR <span class="bg-gradient-to-r from-cyan-400 via-blue-500 to-blue-400 bg-clip-text text-transparent" style="text-shadow: 0 0 20px rgba(59, 130, 246, 0.5);">AI ASSISTANT</span>
                    </h2>
                    <p class="font-inter text-sm sm:text-lg md:text-xl text-gray-200 max-w-3xl mx-auto leading-relaxed font-medium">
                        Get instant answers about our services with our intelligent <span class="text-cyan-400 font-bold">AI assistant</span>
                    </p>
                </div>

                <!-- Chat Interface with Background Integration -->
                <div class="max-w-5xl mx-auto relative">
                    <!-- Robot Image -->
                    <div class="absolute top-0 left-0 hidden sm:block">
                        <img src="{{ asset('assets/prosigmaka/photos/robot-r-v2.png') }}" 
                            alt="Robot Background" 
                            class="transform -translate-x-3/4 w-96 h-96 sm:w-[500px] sm:h-[500px] lg:w-[600px] lg:h-[600px] object-contain"
                            loading="lazy">
                    </div>
                    <!-- Chat Container -->
                    <div class="relative bg-transparent">

                        <!-- Chat Messages Area -->
                        <div class="bg-black/40 border-2 border-purple-500/40 rounded-3xl p-6 sm:p-8 mb-6 shadow-2xl relative hover:border-blue-500/50 transition-all duration-300" id="chat-container" style="box-shadow: 0 0 30px rgba(168, 85, 247, 0.3);">
                            <!-- Clean Background Pattern -->
                            <div class="absolute inset-0 opacity-10">
                                <div class="absolute inset-0 bg-gradient-to-br from-purple-500/20 to-blue-500/20"></div>
                            </div>
                            <div class="flex items-center space-x-4 relative z-10 mb-4">
                                <!-- Agent Avatar -->
                                <div class="relative">
                                    <div class="w-16 h-16 sm:w-20 sm:h-20 flex items-center justify-center relative z-10">
                                        <img src="{{ asset('assets/prosigmaka/photos/pala-r-v2.png') }}" 
                                            alt="AI Decoration" 
                                            class="w-full h-full object-contain"
                                            style="animation-duration: 3s; animation-delay: 1s;"
                                            loading="lazy">
                                    </div>
                                </div>
                                
                                <!-- Agent Info -->
                                <div class="text-center sm:text-left">
                                    <h3 class="text-xl sm:text-2xl font-bold text-white mb-1">ProSigmaka Assistant</h3>
                                    <p class="text-cyan-400 text-sm sm:text-base font-semibold flex items-center justify-center sm:justify-start">
                                        <span class="w-2 h-2 bg-cyan-400 rounded-full mr-2 animate-pulse"></span>
                                        Online • Ready to help
                                    </p>
                                </div>
                            </div>
                            
                            <!-- Chat Messages -->
                            <div class="space-y-4 mb-6 relative z-10 h-96 overflow-y-auto" id="chat-messages">
                            </div>

                            <!-- Chat Input Bar -->
                            <div class="relative z-10">
                                <div class="flex space-x-3">
                                    <div class="flex-1 relative">
                                        <input 
                                            type="text" 
                                            placeholder="Mulai chat dengan AI..." 
                                            class="w-full bg-purple-900/50 border-2 border-purple-500/50 rounded-2xl px-4 py-3 text-white placeholder-purple-200 focus:outline-none focus:border-cyan-400 focus:ring-2 focus:ring-cyan-400/30 transition-all duration-300 shadow-lg"
                                            id="chat-input"
                                        />
                                        <!-- Typing indicator (hidden by default) -->
                                        <div class="absolute right-4 top-1/2 transform -translate-y-1/2 hidden" id="typing-indicator">
                                            <div class="flex space-x-1">
                                                <div class="w-2 h-2 bg-cyan-400 rounded-full animate-bounce"></div>
                                                <div class="w-2 h-2 bg-blue-400 rounded-full animate-bounce" style="animation-delay: 0.1s"></div>
                                                <div class="w-2 h-2 bg-cyan-400 rounded-full animate-bounce" style="animation-delay: 0.2s"></div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Send Button -->
                                    <button 
                                        class="bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 text-white p-4 rounded-2xl transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-purple-500/20 shadow-lg"
                                        id="send-button"
                                    >
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                        </svg>
                                    </button>
                                    
                                    <!-- WhatsApp Alternative Button -->
                                    <button 
                                        class="bg-gradient-to-r from-green-500 to-green-600 hover:from-green-600 hover:to-green-700 text-white p-4 rounded-2xl transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-green-500/20 shadow-lg hover:shadow-green-500/25 group relative"
                                        id="whatsapp-chat-button"
                                        onclick="window.open('https://wa.me/6281292787801?text=Hello,%20I%27m%20interested%20in%20your%20services', '_blank')"
                                    >
                                        <!-- WhatsApp Icon -->
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                                        </svg>
                                        
                                        <!-- Pulse Ring -->
                                        <div class="absolute inset-0 rounded-2xl bg-green-400 animate-ping opacity-20"></div>
                                        
                                        <!-- Tooltip -->
                                        <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 px-3 py-2 bg-gray-800 text-white text-xs rounded-lg opacity-0 group-hover:opacity-100 transition-opacity duration-300 whitespace-nowrap pointer-events-none">
                                            Chat via WhatsApp
                                            <div class="absolute top-full left-1/2 transform -translate-x-1/2">
                                                <div class="w-0 h-0 border-l-4 border-r-4 border-t-4 border-l-transparent border-r-transparent border-t-gray-800"></div>
                                            </div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
