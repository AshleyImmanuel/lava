@props(['events', 'themeColor'])

@if($events->count() > 0)
<div>
    <div class="flex items-center gap-4 mb-8">
        <span class="text-5xl font-black text-white/10 font-[Orbitron]">01</span>
        <div>
            <h2 class="text-3xl font-bold text-white font-[Orbitron]">Upcoming Events</h2>
            <div class="h-0.5 w-12 mt-2" style="background-color: {{ $themeColor }}"></div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($events as $event)
        <div class="group relative">
            <div class="absolute -inset-0.5 rounded-xl blur opacity-0 group-hover:opacity-60 transition duration-500" style="background: linear-gradient(135deg, {{ $themeColor }}, transparent);"></div>
            <div class="relative bg-zinc-900/80 backdrop-blur border border-white/10 rounded-xl p-6 hover:bg-black/60 transition-all flex flex-col h-full">
                <div class="flex justify-between items-start mb-4">
                    <div class="px-2 py-1 bg-white/5 rounded text-[10px] font-bold uppercase tracking-wider text-white border border-white/10">
                        {{ $event->start_time->format('M d, Y') }}
                    </div>
                    <span class="w-2 h-2 rounded-full animate-pulse" style="background-color: {{ $themeColor }}"></span>
                </div>
                
                <h3 class="text-xl font-bold text-white font-[Orbitron] mb-2 leading-tight">{{ $event->title }}</h3>
                <p class="text-sm text-gray-400 mb-6 flex-grow">{{ Str::limit($event->description, 60) }}</p>
                
                <div class="flex items-center justify-between pt-4 border-t border-white/5">
                    <div class="text-xs font-bold text-gray-500 uppercase">Prize: <span class="text-white">{{ $event->prize_pool ?? 'TBA' }}</span></div>
                    <a href="{{ route('events.show', $event) }}" class="text-xs font-bold uppercase hover:text-white transition-colors" style="color: {{ $themeColor }}">View Event &rarr;</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
