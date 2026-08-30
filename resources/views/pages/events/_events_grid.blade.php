<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
    @forelse($events as $event)
    <div class="group relative bg-black/40 border border-white/10 rounded-3xl overflow-hidden hover:border-lava-500/50 transition-all duration-500 tilt-card flex flex-col">
        <!-- Hover Glow -->
        <div class="absolute inset-0 bg-gradient-to-br from-lava-600/10 to-transparent opacity-0 group-hover:opacity-100 transition-duration-500 pointer-events-none"></div>

        <!-- Image Container -->
        <div class="relative h-48 overflow-hidden shrink-0">
            <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent z-10"></div>
            @if($event->image_url)
                <img src="{{ $event->image_url }}" alt="{{ $event->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
            @else
                @php
                    // Map game names to banner images
                    $gameBanners = [
                        'VALORANT' => '/images/events/valorant-banner.svg',
                        'Counter-Strike 2' => '/images/events/cs2-banner.svg',
                        'Free Fire' => '/images/events/freefire-banner.svg',
                    ];
                    $gameName = $event->game->name ?? '';
                    $bannerUrl = $gameBanners[$gameName] ?? null;
                @endphp
                @if($bannerUrl)
                    <img src="{{ $bannerUrl }}" alt="{{ $gameName }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                @else
                    <div class="w-full h-full bg-gradient-to-br from-[#dc2626]/40 via-[#7f1d1d]/30 to-black flex items-center justify-center">
                        <svg class="w-16 h-16 text-white/10" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M21 6H3c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-10 7H8v3H6v-3H3v-2h3V8h2v3h3v2zm4.5 2c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm4-3c-.83 0-1.5-.67-1.5-1.5S18.67 9 19.5 9s1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/>
                        </svg>
                    </div>
                @endif
            @endif
            
            <!-- Status Badge -->
            <div class="absolute top-4 right-4 z-20">
                @php
                    $statusColors = [
                        'upcoming' => 'bg-blue-500/20 text-blue-400 border-blue-500/30',
                        'live' => 'bg-red-500/20 text-red-400 border-red-500/30 animate-pulse',
                        'completed' => 'bg-gray-500/20 text-gray-400 border-gray-500/30',
                        'cancelled' => 'bg-red-900/20 text-red-500 border-red-900/30',
                    ];
                    $statusClass = $statusColors[$event->status] ?? 'bg-white/10 text-gray-400 border-white/10';
                @endphp
                <span class="px-3 py-1 rounded-lg backdrop-blur-md border border-white/10 text-xs font-bold tracking-widest uppercase pixelate {{ $statusClass }}">
                    {{ $event->status }}
                </span>
            </div>

            <!-- Game Badge -->
                <div class="absolute top-4 left-4 z-20">
                <span class="px-3 py-1 rounded-lg bg-black/60 backdrop-blur-md border border-white/10 text-xs font-bold text-white tracking-widest uppercase pixelate">
                    {{ $event->game->name ?? 'ESPORTS' }}
                </span>
            </div>
        </div>

        <!-- Content -->
        <div class="relative z-20 p-6 flex flex-col flex-grow">
            <div class="flex items-center gap-2 mb-3 text-sm text-gray-400">
                <svg class="w-4 h-4 text-lava-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>{{ $event->start_time->format('M d, Y • h:i A') }}</span>
            </div>

            <h3 class="text-xl font-bold text-white font-[Orbitron] mb-2 group-hover:text-lava-400 transition-colors line-clamp-1">{{ $event->title }}</h3>
            
            <p class="text-gray-400 text-sm mb-6 line-clamp-2">
                {{ $event->description }}
            </p>

            <div class="mt-auto">
                <div class="grid grid-cols-2 gap-4 mb-6 border-t border-b border-white/20 py-4 bg-black/30 -mx-6 px-6">
                    <div class="text-center border-r border-white/20">
                        <div class="text-[10px] uppercase tracking-widest mb-1 font-bold" style="color: #9ca3af;">Prize Pool</div>
                        <div class="text-lg font-black font-[Orbitron]" style="color: #22c55e;">₹{{ number_format($event->prize_pool) }}</div>
                    </div>
                    <div class="text-center">
                        <div class="text-[10px] uppercase tracking-widest mb-1 font-bold" style="color: #9ca3af;">Entry Fee</div>
                        <div class="text-lg font-black font-[Orbitron]" style="color: {{ $event->entry_fee > 0 ? '#f97316' : '#22c55e' }};">{{ $event->entry_fee > 0 ? '₹'.number_format($event->entry_fee) : 'FREE' }}</div>
                    </div>
                </div>

                <!-- Action -->
                <a href="{{ route('events.show', $event) }}" class="block w-full py-3 rounded-xl text-center text-sm font-bold uppercase tracking-widest transition-all duration-300" style="background: linear-gradient(135deg, #1a0a0a 0%, #2d1a1a 100%); color: #f44336; border: 1px solid #f44336; box-shadow: 0 0 15px rgba(244, 67, 54, 0.3), inset 0 0 20px rgba(244, 67, 54, 0.05);" onmouseover="this.style.background='linear-gradient(135deg, #f44336 0%, #e53935 100%)'; this.style.color='#ffffff'; this.style.boxShadow='0 0 25px rgba(244, 67, 54, 0.6), inset 0 0 20px rgba(255,255,255,0.1)'; this.style.transform='translateY(-2px)';" onmouseout="this.style.background='linear-gradient(135deg, #1a0a0a 0%, #2d1a1a 100%)'; this.style.color='#f44336'; this.style.boxShadow='0 0 15px rgba(244, 67, 54, 0.3), inset 0 0 20px rgba(244, 67, 54, 0.05)'; this.style.transform='translateY(0)';">
                    View Details
                </a>
            </div>
        </div>
    </div>
    @empty
    <div class="col-span-full py-24 text-center">
        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-white/5 mb-6">
            <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
        </div>
        <h3 class="text-xl font-bold text-white mb-2">No Events Found</h3>
        <p class="text-gray-400">Check back later for upcoming tournaments.</p>
    </div>
    @endforelse
</div>

<!-- Pagination -->
<div class="mt-16">
    {{ $events->links() }}
</div>
