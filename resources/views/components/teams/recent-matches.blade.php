@props(['matches', 'themeColor', 'index' => '01'])

@if($matches->count() > 0)
<div>
     <div class="flex items-center gap-4 mb-8">
        <span class="text-5xl font-black text-white/10 font-[Orbitron]">{{ $index }}</span>
        <div>
            <h2 class="text-3xl font-bold text-white font-[Orbitron]">Recent Victories</h2>
            <div class="h-0.5 w-12 mt-2" style="background-color: {{ $themeColor }}"></div>
        </div>
    </div>

    <div class="space-y-4">
        @foreach($matches as $match)
        <div class="group relative">
            <div class="absolute left-0 top-0 bottom-0 w-1 bg-gradient-to-b from-transparent via-{{ $themeColor }} to-transparent opacity-50 group-hover:opacity-100 transition-opacity"></div>
            <div class="bg-zinc-900/50 hover:bg-zinc-900/80 border border-white/5 hover:border-white/10 p-4 rounded-r-xl transition-all flex items-center justify-between gap-6">
                <div class="flex items-center gap-6">
                    <div class="text-center px-4 border-r border-white/5">
                        <div class="text-xs text-gray-500 font-bold uppercase mb-1">Score</div>
                        <div class="text-2xl font-black text-white font-[Orbitron]">{{ $match->score_team_a }} - {{ $match->score_team_b }}</div>
                    </div>
                    <div>
                        <h4 class="text-white font-bold font-[Orbitron] text-lg">{{ $match->event->title ?? 'Unknown Event' }}</h4>
                        <div class="text-xs text-green-400 font-bold uppercase tracking-wider flex items-center gap-2">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            Victory
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <div class="text-xs text-gray-500 font-bold uppercase">{{ $match->created_at->diffForHumans() }}</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif
