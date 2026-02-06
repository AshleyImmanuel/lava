<!-- Teams/Roster Preview Section -->
<section id="teams" class="py-24 relative overflow-hidden">
    <!-- Background -->
    <div class="absolute inset-0 bg-transparent"></div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <span class="text-ember-500 font-semibold uppercase tracking-widest text-sm">Our Champions</span>
            <h2 class="section-title text-4xl md:text-5xl text-white mt-4 mb-6">Featured Players</h2>
            <div class="lava-divider w-24 mx-auto"></div>
        </div>

        <!-- Players Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Player Card Template -->
            @foreach([
                ['name' => 'Phoenix', 'role' => 'Team Captain', 'game' => 'VALORANT', 'color' => 'red'],
                ['name' => 'Blaze', 'role' => 'Entry Fragger', 'game' => 'CS2', 'color' => 'orange'],
                ['name' => 'Viper', 'role' => 'Sniper', 'game' => 'Free Fire', 'color' => 'red'],
                ['name' => 'Vulcan', 'role' => 'Support', 'game' => 'VALORANT', 'color' => 'orange'],
            ] as $player)
            <div class="glass-card rounded-2xl p-6 text-center hover-lift group border border-{{ $player['color'] }}-500 shadow-[0_0_15px_-3px_rgba(0,0,0,0.5)] shadow-{{ $player['color'] }}-500/20 bg-zinc-900/80 hover:bg-zinc-800/90 transition-all duration-300">
                <!-- Player Avatar -->
                <div class="w-24 h-24 mx-auto mb-4 rounded-full bg-black flex items-center justify-center relative overflow-hidden ring-2 ring-{{ $player['color'] }}-500 shadow-lg shadow-{{ $player['color'] }}-500/20 group-hover:scale-110 transition-transform duration-300">
                    <div class="absolute inset-0 bg-gradient-to-br from-{{ $player['color'] }}-600/20 to-transparent"></div>
                    <span class="text-4xl font-bold text-white font-[Orbitron] relative z-10">{{ substr($player['name'], 0, 1) }}</span>
                </div>
                <h3 class="text-2xl font-black text-white font-[Orbitron] mb-2 tracking-wide">{{ $player['name'] }}</h3>
                <p class="text-{{ $player['color'] }}-400 font-bold uppercase tracking-wider text-xs mb-4">{{ $player['role'] }}</p>
                <div class="inline-block px-5 py-1.5 rounded-full bg-gradient-to-r from-{{ $player['color'] }}-600 to-{{ $player['color'] }}-500 border border-{{ $player['color'] }}-400 shadow-lg shadow-{{ $player['color'] }}-900/50">
                    <span class="text-white text-xs font-black tracking-widest">{{ $player['game'] }}</span>
                </div>
            </div>
            @endforeach
        </div>

        <!-- View All Button -->
        <div class="text-center mt-12">
            <a href="{{ route('teams.index') }}" class="btn-outline px-8 py-3 rounded-xl font-semibold inline-flex items-center space-x-2">
                <span>View All Players</span>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>
</section>
