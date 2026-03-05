@props(['team'])

<div class="mb-16">
    <div class="flex items-center gap-4 mb-6">
        <h2 class="text-2xl font-bold text-white font-[Orbitron]">Active Roster</h2>
        <div class="h-0.5 flex-1 bg-gradient-to-r from-white/10 to-transparent"></div>
    </div>

    @if($team->members->count() > 0)
    <div class="space-y-3">
        @foreach($team->members as $index => $member)
        <div class="flex items-center gap-4 p-4 rounded-xl bg-white/5 border border-white/10 hover:border-white/20 hover:bg-white/10 transition-all">
            <!-- Number -->
            <span class="text-2xl font-black text-white/20 font-[Orbitron] w-8">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
            
            <!-- Avatar -->
            <div class="relative w-12 h-12 flex-shrink-0">
                <div class="w-full h-full rounded-full bg-gradient-to-br from-zinc-800 to-black border border-white/10 flex items-center justify-center">
                    <span class="text-lg font-bold text-white">{{ substr($member->user->name, 0, 1) }}</span>
                </div>
                @if($member->role === 'igl')
                    <div class="absolute -bottom-1 -right-1 w-5 h-5 bg-yellow-500 rounded-full flex items-center justify-center border-2 border-black" title="In-Game Leader">
                        <svg class="w-2.5 h-2.5 text-black" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                @endif
            </div>

            <!-- Info -->
            <div class="flex-1">
                <h3 class="text-lg font-bold text-white">{{ $member->user->name }}</h3>
                <span class="text-xs font-bold uppercase tracking-wider text-gray-500">{{ $member->role }}</span>
            </div>

            <!-- Rank Badge -->
            @if($member->user->rank_info)
                <div class="px-3 py-1 rounded-full bg-white/5 border border-white/10">
                    <span class="text-xs text-gray-300 font-mono">{{ $member->user->rank_info['rank'] ?? 'Unranked' }}</span>
                </div>
            @endif
        </div>
        @endforeach
    </div>
    @else
    <div class="py-12 text-center bg-white/5 rounded-xl border border-white/10">
        <svg class="w-10 h-10 mx-auto text-gray-600 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
        </svg>
        <p class="text-gray-400 font-medium">No players yet</p>
        <p class="text-gray-500 text-sm">Be the first to join this team!</p>
    </div>
    @endif
</div>
