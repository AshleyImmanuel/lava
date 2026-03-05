@props(['event'])

<!-- Registration Card -->
<div class="bg-gradient-to-br from-gray-900 to-black border border-white/10 rounded-3xl p-6 relative overflow-hidden">
    <div class="absolute top-0 right-0 w-32 h-32 bg-lava-600/20 rounded-full blur-2xl pointer-events-none"></div>
    
    <div class="relative z-10">
        <div class="flex justify-between items-center mb-6">
            <div>
                <div class="text-xs text-gray-500 uppercase tracking-wider mb-1">Entry Fee</div>
                <div class="text-3xl font-black text-white font-[Orbitron]">{{ $event->entry_fee > 0 ? '$'.number_format($event->entry_fee) : 'FREE' }}</div>
            </div>
            <div class="text-right">
                <div class="text-xs text-gray-500 uppercase tracking-wider mb-1">Prize Pool</div>
                <div class="text-2xl font-bold text-lava-400 font-[Orbitron]">${{ number_format($event->prize_pool) }}</div>
            </div>
        </div>

        @auth
            @if(!$event->registrations()->where('user_id', auth()->id())->exists())
                @php
                    $gameName = strtolower($event->game->name ?? '');
                    $labels = [
                        'id' => 'Game UID',
                        'name' => 'In-Game Name (IGN)', 
                        'level' => 'Account Level'
                    ];
                    $placeholders = [
                        'id' => 'e.g. 123456789',
                        'name' => 'e.g. LAVA_Player',
                        'level' => 'e.g. 50'
                    ];

                    if (str_contains($gameName, 'valorant')) {
                        $labels['id'] = 'Riot ID';
                        $labels['name'] = 'Tagline';
                        $labels['level'] = 'Current Rank';
                        $placeholders['id'] = 'e.g. PlayerName';
                        $placeholders['name'] = 'e.g. #NA1';
                        $placeholders['level'] = 'e.g. Ascendant 1';
                    } elseif (str_contains($gameName, 'counter')) {
                        $labels['id'] = 'Steam ID';
                        $labels['level'] = 'Premier Rating / Rank';
                        $placeholders['id'] = 'e.g. 765611980...';
                        $placeholders['level'] = 'e.g. 15,000 / Global Elite';
                    }
                @endphp

                <form action="{{ route('events.register', $event) }}" method="POST" class="space-y-4">
                    @csrf
                    
                    <!-- Game Details -->
                    <div class="space-y-3">
                        <div>
                            <label class="text-xs text-gray-500 uppercase tracking-widest font-bold ml-1">{{ $labels['id'] }}</label>
                            <input type="text" name="ingame_id" required placeholder="{{ $placeholders['id'] }}" class="w-full mt-1 bg-black/50 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-lava-500 focus:ring-1 focus:ring-lava-500 transition-all font-mono text-sm">
                        </div>
                        <div>
                            <label class="text-xs text-gray-500 uppercase tracking-widest font-bold ml-1">{{ $labels['name'] }}</label>
                            <input type="text" name="ingame_name" required placeholder="{{ $placeholders['name'] }}" class="w-full mt-1 bg-black/50 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-lava-500 focus:ring-1 focus:ring-lava-500 transition-all font-mono text-sm">
                        </div>
                        <div>
                            <label class="text-xs text-gray-500 uppercase tracking-widest font-bold ml-1">{{ $labels['level'] }}</label>
                            <input type="text" name="ingame_level" required placeholder="{{ $placeholders['level'] }}" class="w-full mt-1 bg-black/50 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:outline-none focus:border-lava-500 focus:ring-1 focus:ring-lava-500 transition-all font-mono text-sm">
                        </div>
                    </div>

                    <button type="submit" class="w-full py-4 rounded-xl bg-lava-600 text-white font-bold uppercase tracking-widest hover:bg-lava-500 transition-all shadow-[0_0_20px_rgba(220,38,38,0.3)] hover:shadow-[0_0_30px_rgba(220,30,30,0.5)] mt-4">
                        Confirm Registration
                    </button>
                </form>
            @else
                <div class="space-y-4">
                    <div class="w-full py-4 rounded-xl bg-green-600/20 border border-green-600/50 text-green-500 font-bold uppercase tracking-widest text-center flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                        Already Registered
                    </div>
                    
                    <form action="{{ route('events.unregister', $event) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button 
                            type="submit"
                            class="w-full py-3 rounded-xl bg-red-600/10 border border-red-600/20 text-red-500 font-bold uppercase tracking-widest hover:bg-red-600/20 transition-all text-xs"
                        >
                            Unregister
                        </button>
                    </form>
                </div>
            @endif
        @else
            <a href="{{ route('login') }}" class="block w-full py-4 rounded-xl bg-white/10 text-white font-bold uppercase tracking-widest hover:bg-white/20 transition-all text-center">
                Login to Register
            </a>
        @endauth

        <div class="mt-6 space-y-4">
            <div class="flex items-center justify-between text-sm">
                <span class="text-gray-500">Starts</span>
                <span class="text-white">{{ $event->start_time->format('M d, Y • h:i A') }}</span>
            </div>
            <div class="flex items-center justify-between text-sm">
                <span class="text-gray-500">Status</span>
                <span class="text-white capitalize">{{ $event->status }}</span>
            </div>
            <div class="flex items-center justify-between text-sm">
                <span class="text-gray-500">Participants</span>
                <span class="text-white">{{ $event->registrations_count ?? 0 }} Registered</span>
            </div>
        </div>
    </div>
</div>
