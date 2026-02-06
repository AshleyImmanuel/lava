<div class="bg-zinc-900/80 border border-lava-500/40 rounded-3xl p-8 relative overflow-hidden slide-up" style="animation-delay: 0.3s;">
    <div class="absolute top-0 right-0 w-64 h-64 bg-lava-600/20 rounded-full blur-[80px] -translate-y-1/2 translate-x-1/2"></div>
    
    <h3 class="text-sm font-bold tracking-[0.2em] uppercase mb-4 relative z-10" style="color: #f97316;">Team Status</h3>
    
    <div class="flex flex-col md:flex-row items-center justify-between gap-6 relative z-10">
        <div>
            @if($activeTeam)
                <h2 class="text-3xl font-black text-white font-[Orbitron] mb-2">{{ $activeTeam->name }}</h2>
                <div class="flex items-center gap-2">
                    <span class="px-2 py-0.5 rounded-lg bg-green-500/20 text-green-400 border border-green-500/30 text-[10px] font-bold uppercase tracking-widest">Active</span>
                    <p class="text-gray-400 text-sm">Role: {{ $activeTeam->pivot->role ?? 'Member' }}</p>
                </div>
            @elseif(isset($pendingApplication) && $pendingApplication)
                <h2 class="text-3xl font-black text-white font-[Orbitron] mb-2">{{ $pendingApplication->team->name }}</h2>
                <div class="flex items-center gap-2 mb-2">
                    <span class="px-3 py-1 rounded-lg bg-yellow-500/20 text-yellow-400 border border-yellow-500/30 text-xs font-bold uppercase tracking-widest animate-pulse">
                        Application Pending
                    </span>
                </div>
                <p style="color: #d1d5db;" class="max-w-md text-sm">Request sent {{ $pendingApplication->created_at->diffForHumans() }}. Awaiting captain approval.</p>
            @else
                <h2 class="text-3xl font-black text-white font-[Orbitron] mb-2">NO ACTIVE TEAM</h2>
                <p style="color: #d1d5db;" class="max-w-md">You haven't joined a roster yet. Find a team to start competing in tournaments.</p>
            @endif
        </div>
        @if(!$activeTeam)
        <a href="{{ route('teams.index') }}" class="px-8 py-4 rounded-xl bg-lava-600 hover:bg-lava-500 text-white font-bold uppercase tracking-widest shadow-lg shadow-lava-900/50 transition-all hover:scale-105">
            Find a Team
        </a>
        @else
        <a href="{{ route('teams.show', $activeTeam) }}" class="px-8 py-4 rounded-xl bg-white/5 hover:bg-white/10 text-white font-bold uppercase tracking-widest border border-white/10 transition-all">
            View Team
        </a>
        @endif
    </div>
</div>
