@props(['team', 'themeColor'])

<div class="flex flex-col md:flex-row items-center gap-8 mb-12 pt-8">
    <!-- Logo with Glow -->
    <div class="relative w-48 h-48 md:w-64 md:h-64 flex-shrink-0 group">
        <div class="absolute inset-0 rounded-full blur-2xl opacity-40 group-hover:opacity-60 transition duration-500 animate-pulse-slow" style="background-color: {{ $themeColor }}"></div>
        <div class="relative w-full h-full rounded-full bg-black border border-white/10 flex items-center justify-center overflow-hidden" style="box-shadow: 0 0 20px {{ $themeColor }}20;">
            @if($team->logo_url)
                <img src="{{ $team->logo_url }}" class="w-full h-full object-cover">
            @else
                <span class="text-7xl font-black text-white font-[Orbitron]" style="text-shadow: 0 0 20px {{ $themeColor }}">{{ substr($team->name, 0, 1) }}</span>
            @endif
        </div>
    </div>

    <!-- Team Info & Stats -->
    <div class="flex-1 text-center md:text-left">
        <div class="inline-flex items-center gap-3 px-4 py-2 rounded-full border border-white/10 bg-black/40 backdrop-blur mb-6">
            <span class="w-2 h-2 rounded-full animate-pulse" style="background-color: {{ $themeColor }}"></span>
            <span class="font-[Orbitron] text-xs font-bold tracking-[0.2em] text-gray-300 uppercase">{{ $team->game->name ?? 'Esports' }} Division</span>
        </div>

        <h1 class="text-4xl md:text-6xl font-black text-white font-[Orbitron] uppercase tracking-tighter mb-4 drop-shadow-[0_2px_10px_rgba(0,0,0,0.5)]">
            {{ $team->name }}
        </h1>
        
        <p class="text-lg text-gray-400 font-light max-w-2xl leading-relaxed mb-6">
            @if($team->members->count() > 0)
                <span class="text-white font-medium">{{ $team->members->count() }} Active Players</span> ready for battle
            @else
                Building our roster — join the team!
            @endif
        </p>

        <!-- Action Buttons -->
        <div class="flex flex-wrap gap-4 justify-center md:justify-start">
            @auth
                @if(auth()->user()->teams->contains($team))
                    <div class="px-6 py-3 rounded-xl bg-green-500/10 border border-green-500/30 text-green-400 font-bold uppercase tracking-widest flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-green-500"></span> Member
                    </div>
                @elseif($team->applications()->where('user_id', auth()->id())->where('status', 'pending')->exists())
                    <div class="px-6 py-3 rounded-xl bg-yellow-500/10 border border-yellow-500/30 text-yellow-500 font-bold uppercase tracking-widest flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Application Pending
                    </div>
                @elseif(!auth()->user()->teams()->exists())
                     <div x-data="{ open: false }">
                        <button @click="open = true" class="px-8 py-3 rounded-xl font-bold text-white uppercase tracking-widest transition-all hover:scale-105 hover:shadow-[0_0_20px_rgba(255,255,255,0.2)]" style="background-color: {{ $themeColor }}; box-shadow: 0 4px 15px {{ $themeColor }}40;">
                            Apply to Join
                        </button>
                        <x-teams.application-modal :team="$team" :themeColor="$themeColor" />
                    </div>
                @endif
            @endauth

            <div class="flex items-center gap-4 px-6 py-3 rounded-xl bg-white/5 border border-white/10">
                <div class="text-right">
                    <span class="block text-2xl font-black text-white leading-none">{{ $team->wonMatches->count() }}</span>
                    <span class="text-[10px] text-gray-500 uppercase font-bold">Wins</span>
                </div>
                <div class="w-px h-8 bg-white/10"></div>
                <div class="text-right">
                    <span class="block text-2xl font-black text-white leading-none">{{ $team->members->count() }}</span>
                    <span class="text-[10px] text-gray-500 uppercase font-bold">Players</span>
                </div>
            </div>
        </div>
    </div>
</div>
