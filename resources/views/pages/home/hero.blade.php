<!-- Hero Section -->
<section class="relative min-h-screen flex items-center justify-center bg-transparent overflow-hidden">
    <!-- Animated Background Elements - Performance Optimized -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none" style="contain: strict;">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-lava-500/15 rounded-full blur-2xl opacity-50"></div>
        <div class="absolute bottom-1/4 right-1/4 w-80 h-80 bg-ember-500/15 rounded-full blur-2xl opacity-50"></div>
    </div>

    <!-- Grid Pattern Overlay -->
    <div class="absolute inset-0 opacity-10 pointer-events-none" style="background-image: linear-gradient(rgba(255,255,255,.1) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,.1) 1px, transparent 1px); background-size: 50px 50px;"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center pt-20">
        <!-- Badge -->
        <div class="reveal inline-flex items-center px-4 py-2 rounded-full bg-ash-900/60 border border-ash-700/50 mb-8 pixelate" data-delay="0">
            <span class="w-2 h-2 bg-lava-500 rounded-full mr-2 animate-pulse"></span>
            <span class="text-sm text-white font-medium">Now Recruiting Pro Players</span>
        </div>

        <!-- Main Heading with Split Reveal -->
        <h1 class="text-5xl md:text-7xl lg:text-8xl font-bold font-[Orbitron] mb-6 tracking-tight" data-delay="100">
            <div class="split-reveal">
                <span class="text-white">RISE FROM</span>
            </div>
            <div class="split-reveal" style="animation-delay: 0.1s">
                <span class="gradient-text">THE FLAMES</span>
            </div>
        </h1>

        <!-- Subheading -->
        <p class="reveal text-xl md:text-2xl text-white max-w-3xl mx-auto mb-10 leading-relaxed font-medium" data-delay="200">
            Welcome to <span class="text-lava-400 font-semibold">LAVA ESPORTS</span> — where passion meets competition. 
            Join our elite teams and dominate the battlefield.
        </p>

        <!-- CTA Buttons -->
        <div class="reveal flex flex-col sm:flex-row gap-4 justify-center items-center mb-16" data-delay="300">
            <a href="#teams" class="btn-lava px-8 py-4 rounded-xl font-bold text-lg text-white flex items-center space-x-2 transition-transform hover:scale-105 active:scale-95">
                <span>Join Our Team</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
            </a>
            <a href="#games" class="btn-outline px-8 py-4 rounded-xl font-bold text-lg flex items-center space-x-2 transition-transform hover:scale-105 active:scale-95">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>Watch Highlights</span>
            </a>
        </div>

        <!-- Stats Preview -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl mx-auto stagger-children">
            <div class="stat-card rounded-2xl p-6 hover-lift border border-orange-500/30 bg-black/60">
                <div class="text-4xl md:text-5xl font-bold font-[Orbitron] text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-500 mb-2 counter" data-target="{{ $stats['players'] ?? 0 }}">0</div>
                <div class="text-gray-300 text-sm uppercase tracking-wider">Pro Players</div>
            </div>
            <div class="stat-card rounded-2xl p-6 hover-lift border border-orange-500/30 bg-black/60">
                <div class="text-4xl md:text-5xl font-bold font-[Orbitron] text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-500 mb-2 counter" data-target="{{ $stats['tournaments'] ?? 0 }}">0</div>
                <div class="text-gray-300 text-sm uppercase tracking-wider">Tournaments</div>
            </div>
            <div class="stat-card rounded-2xl p-6 hover-lift border border-orange-500/30 bg-black/60">
                <div class="text-4xl md:text-5xl font-bold font-[Orbitron] text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-500 mb-2 counter" data-target="{{ $stats['games'] ?? 0 }}">0</div>
                <div class="text-gray-300 text-sm uppercase tracking-wider">Game Titles</div>
            </div>
            <div class="stat-card rounded-2xl p-6 hover-lift border border-orange-500/30 bg-black/60">
                <div class="text-4xl md:text-5xl font-bold font-[Orbitron] text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-500 mb-2 counter" data-target="{{ $stats['community'] ?? 0 }}">0</div>
                <div class="text-gray-300 text-sm uppercase tracking-wider">Community</div>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce opacity-70">
        <svg class="w-6 h-6 text-ash-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
        </svg>
    </div>
</section>
