<div class="space-y-8">
    <!-- Application History -->
    <div class="bg-white/5 border border-white/10 rounded-3xl p-8 backdrop-blur-sm slide-up" style="animation-delay: 0.5s;">
        <h3 class="text-xl font-bold text-white font-[Orbitron] mb-6">TEAM APPLICATIONS</h3>
        @if($applicationHistory->isNotEmpty())
            <div class="space-y-4">
                @foreach($applicationHistory as $app)
                <div class="flex items-center justify-between p-4 rounded-xl bg-black/40 border border-white/5">
                    <div class="flex items-center gap-4">
                        <!-- Team Logo or Placeholder -->
                        @if($app->team->logo_url)
                            <img src="{{ $app->team->logo_url }}" alt="{{ $app->team->name }}" class="w-10 h-10 rounded-lg object-contain bg-white/5 p-1">
                        @else
                            <div class="w-10 h-10 rounded-lg bg-gray-800 flex items-center justify-center font-bold text-gray-500 text-xs">
                                {{ substr($app->team->name, 0, 2) }}
                            </div>
                        @endif
                        
                        <div>
                            <h4 class="font-bold text-white">{{ $app->team->name }}</h4>
                            <div class="text-xs text-gray-500">{{ $app->created_at->format('M d, Y') }}</div>
                        </div>
                    </div>
                    
                    <div>
                        @if($app->status === 'approved')
                            <span class="px-3 py-1 rounded-lg bg-green-500/20 text-green-400 border border-green-500/30 text-[10px] font-bold uppercase tracking-widest">
                                Accepted
                            </span>
                        @elseif($app->status === 'rejected')
                            <span class="px-3 py-1 rounded-lg bg-red-500/20 text-red-500 border border-red-500/30 text-[10px] font-bold uppercase tracking-widest">
                                Rejected
                            </span>
                        @else
                            <span class="px-3 py-1 rounded-lg bg-yellow-500/20 text-yellow-400 border border-yellow-500/30 text-[10px] font-bold uppercase tracking-widest">
                                Pending
                            </span>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500 text-sm">No team applications found.</p>
        @endif
    </div>

    <!-- Event History -->
    <div class="bg-white/5 border border-white/10 rounded-3xl p-8 backdrop-blur-sm slide-up" style="animation-delay: 0.6s;">
        <h3 class="text-xl font-bold text-white font-[Orbitron] mb-6">MATCH HISTORY</h3>
        @if($eventHistory->isNotEmpty())
            <div class="space-y-4">
                @foreach($eventHistory as $registration)
                <div class="flex items-center justify-between p-4 rounded-xl bg-black/40 border border-white/5 group hover:border-white/10 transition-colors">
                    <div class="flex items-center gap-4">
                        <!-- Game Icon -->
                        <div class="w-10 h-10 rounded-lg bg-gray-800 flex items-center justify-center font-bold text-gray-500 border border-white/5 group-hover:text-white transition-colors">
                            {{ substr($registration->event->game->name ?? 'E', 0, 1) }}
                        </div>
                        
                        <div>
                            <h4 class="font-bold text-white group-hover:text-gray-200 transition-colors">{{ $registration->event->title }}</h4>
                            <div class="text-xs text-gray-500">{{ $registration->event->start_time->format('M d, Y') }}</div>
                        </div>
                    </div>
                    
                    <a href="{{ route('events.show', $registration->event) }}" class="text-xs font-bold text-gray-500 hover:text-white uppercase tracking-wider transition-colors">
                        View Results
                    </a>
                </div>
                @endforeach
            </div>
        @else
            <p class="text-gray-500 text-sm">No match history available yet.</p>
        @endif
    </div>
</div>
