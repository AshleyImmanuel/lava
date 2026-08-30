@props(['events', 'themeColor', 'themeColorDark'])

@if($events && $events->count() > 0)
    <div class="space-y-4">
        @foreach($events as $event)
            <div onclick="toggleEvent('{{ $event->id }}')" class="group relative cursor-pointer">
                <!-- Card Background -->
                <div class="bg-zinc-900/50 backdrop-blur border border-white/10 rounded-xl overflow-hidden transition-all duration-300"
                     onmouseover="this.style.borderColor='{{ $themeColor }}80'" 
                     onmouseout="this.style.borderColor='rgba(255,255,255,0.1)'">
                    
                    <!-- Date Badge (Absolute) -->
                    <div class="absolute top-0 right-0 p-4">
                        <div class="flex flex-col items-center bg-black/50 border border-white/10 rounded px-2 py-1">
                            <span class="text-xs font-bold text-gray-400">{{ $event->start_time->format('M') }}</span>
                            <span class="text-xl font-bold text-white">{{ $event->start_time->format('d') }}</span>
                        </div>
                    </div>

                    <div class="p-6 pr-16">
                        <div class="text-xs font-bold uppercase tracking-widest mb-1" style="color: {{ $themeColor }}">{{ $event->status ?? 'Upcoming' }}</div>
                        <h3 class="text-xl font-bold text-white font-[Orbitron] leading-tight mb-4">{{ $event->name }}</h3>
                        
                        <!-- Arrow Indicator -->
                        <div class="flex items-center gap-2 text-xs text-gray-500 group-hover:text-white transition-colors">
                            <span>View Details</span>
                            <svg id="arrow-{{ $event->id }}" class="w-3 h-3 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </div>
                    </div>

                    <!-- Hidden Details Panel -->
                    <div id="details-{{ $event->id }}" class="hidden border-t border-white/5 bg-black/20 p-6 space-y-4">
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <div class="text-[10px] text-gray-500 uppercase font-bold">Prize Pool</div>
                                <div class="text-sm font-bold text-emerald-400">{{ str_replace('$', '₹', $event->prize_pool ?? 'TBA') }}</div>
                            </div>
                            <div>
                                <div class="text-[10px] text-gray-500 uppercase font-bold">Time</div>
                                <div class="text-sm font-bold text-white">{{ $event->start_time->format('H:i A') }}</div>
                            </div>
                        </div>
                        @if($event->description)
                            <div class="pt-2 border-t border-white/5">
                                <p class="text-xs text-gray-400 leading-relaxed">{{ Str::limit($event->description, 100) }}</p>
                            </div>
                        @endif
                        <a href="{{ route('events.show', $event) }}" 
                           class="block w-full py-2 rounded text-center text-xs font-bold text-white uppercase tracking-widest transition-colors"
                           style="background-color: {{ $themeColor }}"
                           onmouseover="this.style.backgroundColor='{{ $themeColorDark }}'"
                           onmouseout="this.style.backgroundColor='{{ $themeColor }}'">
                            Register
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script>
        function toggleEvent(id) {
            const details = document.getElementById('details-' + id);
            const arrow = document.getElementById('arrow-' + id);
            details.classList.toggle('hidden');
            arrow.classList.toggle('rotate-180');
        }
    </script>
@else
    <div class="p-8 rounded-xl bg-white/5 border border-white/5 border-dashed text-center">
        <p class="text-gray-500 text-sm font-[Orbitron]">NO_UPCOMING_EVENTS</p>
    </div>
@endif
