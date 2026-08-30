<!-- Games Section - Split Layout with Scroll Triggers -->
<section id="games" class="py-24 bg-transparent relative overflow-hidden">
    <!-- Background accent -->\r
    <div class="absolute top-0 left-0 w-1/2 h-full bg-gradient-to-r from-lava-950/30 to-transparent pointer-events-none"></div>\r
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-lava-600/10 rounded-full blur-2xl pointer-events-none"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Section Header with Split Reveal -->
        <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between mb-16 gap-8">
            <div class="slide-left">
                <span class="text-red-500 font-black uppercase tracking-[0.3em] text-xs pixelate show">// OUR DIVISIONS</span>
                <h2 class="text-5xl md:text-6xl font-black text-white mt-4 font-[Orbitron] tracking-tight">
                    <div class="split-reveal"><span>GAMES WE</span></div>
                    <div class="split-reveal"><span><span class="gradient-text">DOMINATE</span></span></div>
                </h2>
            </div>
            <div class="slide-right lg:text-right max-w-md">
                <p class="text-gray-400">Elite teams competing at the highest level across multiple titles. Join the fire.</p>
                <div class="line-grow mt-6"></div>
            </div>
        </div>

        <!-- Games Grid with Stagger -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 stagger-children">
            @foreach($games as $game)
                @php
                    $color = match($game->name) {
                        'VALORANT' => 'lava',
                        'Counter-Strike 2' => 'ember',
                        'Free Fire' => 'orange',
                        default => 'lava'
                    };
                    
                    $shortName = match($game->name) {
                        'VALORANT' => 'VAL',
                        'Counter-Strike 2' => 'CS2',
                        'Free Fire' => 'FF',
                        default => substr($game->name, 0, 3)
                    };
                @endphp
                
                <div class="tilt-card group relative bg-gradient-to-br from-gray-900 to-black border border-gray-800 hover:border-{{ $color }}-500/50 transition-all duration-300 overflow-hidden rounded-xl hover:shadow-[0_0_30px_rgba(249,115,22,0.15)]" style="transform-style: preserve-3d; perspective: 1000px;">
                    <!-- Background Image -->
                    @if($game->image_url)
                        <div class="absolute inset-0 z-0">
                            <img src="{{ $game->image_url }}" alt="{{ $game->name }}" class="w-full h-full object-cover object-top opacity-60 group-hover:opacity-80 transition-all duration-700 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent"></div>
                        </div>
                    @endif

                    <div class="absolute inset-0 bg-gradient-to-br from-{{ $color }}-600/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500" style="transform: translateZ(20px);"></div>
                    <div class="h-40 flex items-center justify-center relative overflow-hidden" style="transform: translateZ(40px);">
                        <span class="text-7xl font-black font-[Orbitron] text-gray-800/50 group-hover:text-{{ $color }}-500/20 transition-all duration-500 select-none uppercase group-hover:scale-110 transform">{{ $shortName }}</span>
                        <div class="absolute top-4 right-4 px-2 py-1 bg-{{ $color }}-500 text-[10px] font-black text-white tracking-wider pixelate shadow-[0_0_10px_rgba(249,115,22,0.4)]">
                            {{ $game->teams_count }} TEAMS
                        </div>
                    </div>
                    <div class="p-6 border-t border-gray-800 relative z-10 group-hover:border-{{ $color }}-500/30 transition-colors" style="transform: translateZ(30px);">
                        <h3 class="text-xl font-black text-white font-[Orbitron] mb-2 group-hover:text-{{ $color }}-400 transition-colors uppercase">{{ $game->name }}</h3>
                        <div class="h-0.5 w-8 bg-{{ $color }}-500 mb-3 transition-all duration-300 group-hover:w-full box-shadow-[0_0_10px_rgba(249,115,22,0.6)]"></div>
                        <p class="text-gray-500 text-sm group-hover:text-gray-300 transition-colors">Elite competition in the world of {{ $game->name }}.</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const cards = document.querySelectorAll('.tilt-card');
            
            cards.forEach(card => {
                card.addEventListener('mousemove', (e) => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    
                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;
                    
                    const rotateX = ((y - centerY) / centerY) * -10; // Max rotation deg
                    const rotateY = ((x - centerX) / centerX) * 10;
                    
                    card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale3d(1.05, 1.05, 1.05)`;
                    card.style.transition = 'transform 0.1s ease'; // Quick follow
                });
                
                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) scale3d(1, 1, 1)';
                    card.style.transition = 'transform 0.5s ease'; // Smooth return
                });
            });
        });
    </script>
</section>
