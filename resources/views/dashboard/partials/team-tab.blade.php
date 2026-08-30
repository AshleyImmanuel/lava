@if($activeTeam)
    <div class="space-y-8 animate-fade-in-up">
        <!-- Team Header -->
        <div class="relative bg-zinc-900 border border-white/10 rounded-3xl p-8 overflow-hidden">
            <!-- Background Gradient -->
            <div class="absolute top-0 right-0 w-96 h-96 bg-gradient-to-br from-red-600/20 to-orange-600/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
            
            <div class="relative z-10 flex flex-col md:flex-row items-center gap-8">
                <!-- Team Logo -->
                <div class="w-32 h-32 md:w-40 md:h-40 relative flex-shrink-0">
                    <div class="absolute inset-0 bg-red-500 blur-2xl opacity-20 animate-pulse"></div>
                    <div class="relative w-full h-full rounded-full bg-black border border-white/10 flex items-center justify-center overflow-hidden">
                        @if($activeTeam->logo_url)
                            <img src="{{ $activeTeam->logo_url }}" alt="{{ $activeTeam->name }}" class="w-full h-full object-cover">
                        @else
                            <span class="text-5xl font-black text-white font-[Orbitron]">{{ substr($activeTeam->name, 0, 1) }}</span>
                        @endif
                    </div>
                </div>
                
                <div class="text-center md:text-left">
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/5 border border-white/10 mb-4">
                        <span class="w-2 h-2 rounded-full bg-orange-500"></span>
                        <span class="text-xs font-bold uppercase tracking-widest text-gray-300">{{ $activeTeam->game->name ?? 'Esports' }} Division</span>
                    </div>
                    
                    <h2 class="text-4xl md:text-5xl font-black text-white font-[Orbitron] mb-2">{{ $activeTeam->name }}</h2>
                    <p class="text-gray-400 max-w-xl">
                        {{ $activeTeam->description ?? 'No description set.' }}
                    </p>
                </div>
                
                <!-- Action Buttons (Ideally for Captains) -->
                @if(Auth::user()->id === $activeTeam->captain_id)
                <div class="md:ml-auto">
                    <button class="px-6 py-3 rounded-xl bg-white/5 hover:bg-white/10 border border-white/10 text-white font-bold uppercase tracking-wider transition-all">
                        Manage Settings
                    </button>
                </div>
                @endif
            </div>
        </div>

        <!-- Roster List -->
        <div>
            <div class="flex items-center gap-4 mb-6">
                <h3 class="text-xl font-bold text-white font-[Orbitron]">ACTIVE ROSTER</h3>
                <div class="h-px flex-1 bg-white/10"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach($activeTeam->members as $member)
                <div class="flex items-center gap-4 p-4 rounded-xl bg-white/5 border border-white/10 hover:border-white/20 transition-all group">
                    <div class="relative w-12 h-12 flex-shrink-0">
                        <div class="w-full h-full rounded-full bg-gradient-to-br from-gray-800 to-black border border-white/10 flex items-center justify-center">
                            <span class="text-lg font-bold text-white">{{ substr($member->user->name, 0, 1) }}</span>
                        </div>
                        @if($member->role === 'igl')
                            <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-yellow-500 rounded-full flex items-center justify-center border-2 border-black" title="In-Game Leader">
                                <svg class="w-2.5 h-2.5 text-black" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            </div>
                        @endif
                    </div>
                    
                    <div class="flex-1">
                        <div class="flex items-center justify-between">
                            <h4 class="font-bold text-white group-hover:text-red-400 transition-colors">{{ $member->user->name }}</h4>
                            @if($member->user->id === Auth::id())
                                <span class="text-[10px] font-bold uppercase tracking-widest text-[#f97316]">YOU</span>
                            @endif
                        </div>
                        <p class="text-xs text-gray-500 font-bold uppercase tracking-wider">{{ $member->role }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@else
    <!-- No Team State -->
    <div class="flex flex-col items-center justify-center py-20 text-center space-y-6 bg-white/5 border border-white/10 rounded-3xl backdrop-blur-sm">
        <div class="w-20 h-20 rounded-full bg-white/5 flex items-center justify-center">
            <svg class="w-10 h-10 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
            </svg>
        </div>
        <div>
            <h2 class="text-2xl font-bold text-white font-[Orbitron] mb-2">No Active Team</h2>
            <p class="text-gray-400 max-w-sm mx-auto">You haven't joined a roster yet. Browse teams to apply or wait for your pending applications.</p>
        </div>
        <a href="{{ route('teams.index') }}" class="px-8 py-3 rounded-xl bg-red-600 hover:bg-red-700 text-white font-bold uppercase tracking-widest transition-all shadow-lg shadow-red-600/20">
            Browse Teams
        </a>
    </div>
@endif
