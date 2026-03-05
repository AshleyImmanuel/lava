<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @forelse($teams as $team)
    <a href="{{ route('teams.show', $team) }}" 
       class="group relative block bg-[#0a0a0a] border border-[#1a1a1a] transition-all duration-300 hover:border-red-600 focus:outline-none">
       
        <!-- Brutalist Hover Tab -->
        <div class="absolute -top-3 -right-3 w-6 h-6 border-t-2 border-r-2 border-red-600 opacity-0 group-hover:opacity-100 transition-opacity"></div>
        <div class="absolute -bottom-3 -left-3 w-6 h-6 border-b-2 border-l-2 border-red-600 opacity-0 group-hover:opacity-100 transition-opacity"></div>

        <!-- Glitch line effect on hover -->
        <div class="absolute top-0 left-0 w-full h-[2px] bg-red-600 transform scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-500 z-20"></div>

        <!-- Upper Image Section -->
        <div class="relative h-56 bg-black flex items-center justify-center overflow-hidden border-b border-[#1a1a1a]">
            <!-- Aggressive pattern background -->
            <div class="absolute inset-0 opacity-[0.03] bg-[radial-gradient(circle_at_center,rgba(255,255,255,1)_1px,transparent_1px)]" style="background-size: 12px 12px;"></div>
            
            <!-- Diagonal slash decorative -->
            <div class="absolute -right-10 -bottom-10 w-40 h-10 bg-red-600/10 transform -rotate-45 block"></div>
            
            @if($team->logo_url && !str_contains($team->logo_url, 'placehold.co'))
                <img src="{{ $team->logo_url }}" 
                     alt="{{ $team->name }}" 
                     class="w-32 h-32 object-contain grayscale group-hover:grayscale-0 group-hover:scale-110 transition-all duration-500 relative z-10">
            @else
                <div class="relative w-28 h-28 bg-[#111] flex items-center justify-center -rotate-3 group-hover:rotate-0 transition-transform duration-500 border border-[#222] z-10 shadow-[0_4px_20px_rgba(220,38,38,0.15)] group-hover:shadow-[0_4px_30px_rgba(220,38,38,0.4)] group-hover:border-red-600/50">
                    <span class="text-4xl font-black text-white/90 font-[Orbitron] tracking-tight group-hover:text-red-500 transition-colors duration-500">{{ substr($team->name, 0, 2) }}</span>
                    <!-- Corner Pins -->
                    <div class="absolute -top-1 -left-1 w-2 h-2 border-t border-l border-red-600/50"></div>
                    <div class="absolute -bottom-1 -right-1 w-2 h-2 border-b border-r border-red-600/50"></div>
                </div>
            @endif
        </div>
        
        <!-- Lower Content Section -->
        <div class="p-6 relative bg-[#0a0a0a]">
            <!-- Badge -->
            <div class="mb-4">
                <span class="inline-block px-3 py-1 bg-red-600 text-white text-[10px] font-bold uppercase tracking-[0.2em] transform -skew-x-12 shrink-0">
                    <span class="block transform skew-x-12">{{ $team->game->nav_name ?? $team->game->name ?? 'ESPORTS' }}</span>
                </span>
            </div>
            
            <!-- Team Name -->
            <h3 class="text-2xl font-black text-white font-[Orbitron] uppercase tracking-wide leading-tight mb-4 group-hover:text-red-500 transition-colors duration-300 truncate">
                {{ $team->name }}
            </h3>
            
            <!-- Stats Row -->
            <div class="flex items-center justify-between text-xs font-mono uppercase tracking-widest text-gray-500 mb-6 border-t border-b border-[#1a1a1a] py-3">
                <div class="flex flex-col">
                    <span class="text-gray-700 text-[9px] mb-1">Region</span>
                    <span class="text-gray-300">{{ $team->region ?? 'Global' }}</span>
                </div>
                <div class="flex flex-col text-right">
                    <span class="text-gray-700 text-[9px] mb-1">Active Roster</span>
                    <span class="text-white font-bold">{{ $team->members_count ?? 0 }} <span class="text-red-600">USR</span></span>
                </div>
            </div>
            
            <!-- Brutalist Button -->
            <div class="relative overflow-hidden px-4 py-3 bg-[#111] border border-[#222] text-center group-hover:border-red-600 transition-colors duration-300">
                <div class="absolute inset-0 bg-red-600 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-500 ease-out z-0"></div>
                <span class="relative z-10 text-xs font-bold text-white uppercase tracking-[0.15em] transition-colors duration-300">
                    Access Roster
                </span>
            </div>
        </div>
    </a>
    @empty
    <div class="col-span-full py-24 text-center border-2 border-dashed border-[#222] bg-[#050505]">
        <div class="inline-block px-4 py-1 bg-red-600/20 text-red-500 text-[10px] font-bold uppercase tracking-[0.3em] font-mono mb-4 border border-red-600/30">
            SYSTEM_EMPTY
        </div>
        <h3 class="text-2xl font-black text-white font-[Orbitron] uppercase tracking-widest mb-2">No Active Teams</h3>
        <p class="text-gray-500 text-sm font-mono uppercase tracking-widest">We are currently scouting for new talent.</p>
    </div>
    @endforelse
</div>

<!-- Pagination -->
<div class="mt-16">
    {{ $teams->links() }}
</div>
