<div class="bg-white/5 border border-white/10 rounded-3xl p-8 backdrop-blur-sm slide-up" style="animation-delay: 0.4s;">
    <div class="flex items-center justify-between mb-8">
        <h3 class="text-xl font-bold text-white font-[Orbitron]">
            {{ $registeredEvents->isNotEmpty() ? 'YOUR SCHEDULE' : 'UPCOMING TOURNAMENTS' }}
        </h3>
        <a href="{{ route('events.index') }}" class="text-xs font-bold text-gray-400 hover:text-white uppercase tracking-widest transition-colors">View All</a>
    </div>

    <div class="space-y-4">
        @php $displayEvents = $registeredEvents->isNotEmpty() ? $registeredEvents : $recommendedEvents; @endphp
        
        @forelse($displayEvents as $event)
            <div class="flex items-center justify-between p-4 rounded-xl bg-black/40 border border-white/5 hover:border-lava-500/50 transition-colors group">
                <div class="flex items-center gap-4">
                    @if($event->image_path)
                        <img src="{{ asset($event->image_path) }}" alt="{{ $event->title }}" class="w-12 h-12 rounded-lg object-cover border border-white/5 group-hover:border-lava-500 transition-colors">
                    @else
                        <div class="w-12 h-12 rounded-lg bg-gray-800 flex items-center justify-center font-bold text-gray-500 border border-white/5 group-hover:text-lava-500 transition-colors">
                            {{ substr($event->game->name ?? 'E', 0, 1) }}
                        </div>
                    @endif
                    <div>
                        <h4 class="font-bold text-white group-hover:text-lava-400 transition-colors">{{ $event->title }}</h4>
                        <div class="text-xs text-gray-500 flex items-center gap-2">
                            <span>{{ $event->start_time->format('M d, H:i') }}</span>
                            <span class="w-1 h-1 rounded-full bg-gray-600"></span>
                            <span class="{{ $event->status == 'live' ? 'text-green-500' : 'text-gray-500' }} uppercase">{{ $event->status }}</span>
                        </div>
                    </div>
                </div>
                <a href="{{ route('events.show', $event) }}" class="px-4 py-2 rounded-lg text-xs font-bold uppercase tracking-wider transition-all duration-300" style="background: linear-gradient(135deg, #1a0a0a 0%, #2d1a1a 100%); color: #f44336; border: 1px solid #f44336; box-shadow: 0 0 10px rgba(244, 67, 54, 0.3);" onmouseover="this.style.background='linear-gradient(135deg, #f44336 0%, #e53935 100%)'; this.style.color='#ffffff'; this.style.boxShadow='0 0 20px rgba(244, 67, 54, 0.5)';" onmouseout="this.style.background='linear-gradient(135deg, #1a0a0a 0%, #2d1a1a 100%)'; this.style.color='#f44336'; this.style.boxShadow='0 0 10px rgba(244, 67, 54, 0.3)';">View</a>
            </div>
        @empty
            <!-- Empty State (Only if absolutely no events exist in DB) -->
            <div class="text-center py-12 border border-dashed border-white/10 rounded-2xl bg-black/20">
                <svg class="w-12 h-12 text-gray-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <p class="font-medium" style="color: #9ca3af;">No events available</p>
                <a href="{{ route('events.index') }}" class="text-sm font-bold hover:underline mt-2 inline-block" style="color: #f97316;">Browse All</a>
            </div>
        @endforelse
    </div>
</div>
