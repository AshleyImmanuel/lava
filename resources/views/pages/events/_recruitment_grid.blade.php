<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @forelse($posts as $post)
    <div class="group relative bg-black/40 border border-white/10 rounded-3xl overflow-hidden hover:border-orange-500/50 transition-all duration-500 flex flex-col">
        <!-- Hover Glow -->
        <div class="absolute inset-0 bg-gradient-to-br from-orange-600/10 to-transparent opacity-0 group-hover:opacity-100 transition-duration-500 pointer-events-none"></div>

        <!-- Header with Game Badge -->
        <div class="relative h-36 overflow-hidden shrink-0 bg-gradient-to-br from-orange-900/40 via-red-900/30 to-black flex items-center justify-center">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent z-10"></div>
            
            <!-- Recruitment Badge Icon -->
            <div class="relative z-10 text-center">
                <svg class="w-12 h-12 text-orange-500/60 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                </svg>
                <span class="text-xs font-black tracking-widest text-orange-400/80 uppercase mt-2 block">Player Recruitment</span>
            </div>

            <!-- Status Badge -->
            <div class="absolute top-4 right-4 z-20">
                <span class="px-3 py-1 rounded-lg backdrop-blur-md border text-xs font-bold tracking-widest uppercase
                    {{ $post->status === 'open' ? 'bg-green-500/20 text-green-400 border-green-500/30' : 'bg-gray-500/20 text-gray-400 border-gray-500/30' }}">
                    {{ $post->status }}
                </span>
            </div>

            <!-- Game Badge -->
            <div class="absolute top-4 left-4 z-20">
                <span class="px-3 py-1 rounded-lg bg-black/60 backdrop-blur-md border border-white/10 text-xs font-bold text-white tracking-widest uppercase">
                    {{ $post->game->name ?? 'ESPORTS' }}
                </span>
            </div>
        </div>

        <!-- Content -->
        <div class="relative z-20 p-6 flex flex-col flex-grow">
            <!-- Deadline -->
            <div class="flex items-center gap-2 mb-3 text-sm text-gray-400">
                <svg class="w-4 h-4 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span>Deadline: {{ $post->deadline->format('M d, Y • h:i A') }}</span>
            </div>

            <h3 class="text-xl font-bold text-white font-[Orbitron] mb-2 group-hover:text-orange-400 transition-colors line-clamp-1">{{ $post->title }}</h3>
            
            <p class="text-gray-400 text-sm mb-4 line-clamp-2">
                {{ $post->description }}
            </p>

            <div class="mt-auto">
                <!-- Info Grid -->
                <div class="grid grid-cols-2 gap-4 mb-6 border-t border-b border-white/20 py-4 bg-black/30 -mx-6 px-6">
                    <div class="text-center border-r border-white/20">
                        <div class="text-[10px] uppercase tracking-widest mb-1 font-bold text-gray-500">Role Needed</div>
                        <div class="text-sm font-black text-orange-400 font-[Orbitron]">{{ $post->role_needed }}</div>
                    </div>
                    <div class="text-center">
                        <div class="text-[10px] uppercase tracking-widest mb-1 font-bold text-gray-500">Team</div>
                        <div class="text-sm font-black text-white font-[Orbitron]">{{ $post->team->name ?? 'Open' }}</div>
                    </div>
                </div>

                <!-- Action -->
                <a href="{{ route('recruitment.show', $post) }}" class="block w-full py-3 rounded-xl text-center text-sm font-bold uppercase tracking-widest transition-all duration-300"
                   style="background: linear-gradient(135deg, #1a0a00 0%, #2d1a0a 100%); color: #f97316; border: 1px solid #f97316; box-shadow: 0 0 15px rgba(249, 115, 22, 0.3), inset 0 0 20px rgba(249, 115, 22, 0.05);"
                   onmouseover="this.style.background='linear-gradient(135deg, #f97316 0%, #ea580c 100%)'; this.style.color='#ffffff'; this.style.boxShadow='0 0 25px rgba(249, 115, 22, 0.6), inset 0 0 20px rgba(255,255,255,0.1)'; this.style.transform='translateY(-2px)';"
                   onmouseout="this.style.background='linear-gradient(135deg, #1a0a00 0%, #2d1a0a 100%)'; this.style.color='#f97316'; this.style.boxShadow='0 0 15px rgba(249, 115, 22, 0.3), inset 0 0 20px rgba(249, 115, 22, 0.05)'; this.style.transform='translateY(0)';">
                    View Details
                </a>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-full py-24 text-center">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-white/5 mb-6">
            <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
            </svg>
        </div>
        <h3 class="text-xl font-bold text-white mb-2">No Recruitment Posts</h3>
        <p class="text-gray-400">No open recruitment posts at the moment. Check back later!</p>
    </div>
    @endforelse
</div>

<!-- Pagination -->
<div class="mt-16">
    {{ $posts->links() }}
</div>
