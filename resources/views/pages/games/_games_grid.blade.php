<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach($games as $game)
        <a href="{{ route('games.show', $game) }}" class="group relative overflow-hidden rounded-2xl bg-zinc-900/50 border border-white/5 hover:border-{{ $game->color ?? 'lava' }}-500/50 transition-all duration-500 h-[400px] flex flex-col">
            <!-- Background Image -->
            @if($game->image_url)
                <img src="{{ $game->image_url }}" alt="{{ $game->name }}" class="absolute inset-0 w-full h-full object-cover opacity-75 transition-transform duration-700 group-hover:scale-110">
            @endif

            <!-- Background Gradient -->
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/20 to-black/90 z-10"></div>
            <div class="absolute inset-0 bg-{{ $game->color ?? 'lava' }}-900/10 group-hover:bg-{{ $game->color ?? 'lava' }}-900/30 transition-colors duration-500 mix-blend-overlay z-10"></div>
            
            <!-- Content -->
            <div class="relative z-20 h-full flex flex-col justify-end p-8">
                <!-- Icon/Logo Placeholder -->
                <div class="mb-auto opacity-20 group-hover:opacity-100 transition-opacity duration-500 transform group-hover:scale-110 origin-top-left">
                    <span class="text-6xl font-black text-white font-[Orbitron]">{{ substr($game->name, 0, 1) }}</span>
                </div>

                <div class="transform group-hover:translate-y-0 translate-y-4 transition-transform duration-500">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="h-1 w-8 bg-{{ $game->color ?? 'lava' }}-500"></div>
                        <span class="text-{{ $game->color ?? 'lava' }}-400 font-bold tracking-wider text-sm uppercase">{{ $game->genre }}</span>
                    </div>
                    
                    <h2 class="text-3xl font-black text-white font-[Orbitron] mb-2 leading-none">{{ $game->name }}</h2>
                    
                    <div class="flex items-center justify-between mt-6 opacity-0 group-hover:opacity-100 transition-opacity duration-500 delay-100">
                        <div class="text-sm text-gray-400">
                            <span class="text-white font-bold">{{ $game->teams_count ?? 0 }}</span> Active Squads
                        </div>
                        <span class="text-white font-bold text-sm flex items-center gap-2">
                            View Division
                            <svg class="w-4 h-4 text-{{ $game->color ?? 'lava' }}-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </span>
                    </div>
                </div>
            </div>
        </a>
    @endforeach
</div>
