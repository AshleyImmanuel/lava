@extends('layouts.app')

@section('content')
<div class="relative min-h-screen pt-24 pb-12">
    <!-- Background Elements -->
    <div class="fixed inset-0 pointer-events-none">
        <div class="absolute top-0 left-0 w-full h-[500px] bg-gradient-to-b from-purple-900/20 to-transparent"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-lava-600/10 rounded-full blur-[100px]"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Back Button -->
        <a href="{{ route('events.index') }}" class="inline-flex items-center text-gray-400 hover:text-white mb-8 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Events
        </a>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Banner Image -->
                <div class="relative h-64 md:h-96 rounded-3xl overflow-hidden border border-white/10">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent z-10"></div>
                    @if($event->image_url)
                        <img src="{{ $event->image_url }}" alt="{{ $event->title }}" class="w-full h-full object-cover">
                    @else
                        @php
                            $gameBanners = [
                                'VALORANT' => '/images/events/valorant-banner.svg',
                                'Counter-Strike 2' => '/images/events/cs2-banner.svg',
                                'Free Fire' => '/images/events/freefire-banner.svg',
                            ];
                            $gameName = $event->game->name ?? '';
                            $bannerUrl = $gameBanners[$gameName] ?? null;
                        @endphp
                        @if($bannerUrl)
                            <img src="{{ $bannerUrl }}" alt="{{ $gameName }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-lava-600/40 via-purple-900/30 to-black flex items-center justify-center">
                                <svg class="w-24 h-24 text-white/10" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M21 6H3c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h18c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm-10 7H8v3H6v-3H3v-2h3V8h2v3h3v2zm4.5 2c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zm4-3c-.83 0-1.5-.67-1.5-1.5S18.67 9 19.5 9s1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/>
                                </svg>
                            </div>
                        @endif
                    @endif
                    
                    <div class="absolute bottom-6 left-6 z-20">
                        <span class="px-3 py-1 rounded-lg bg-lava-600 text-white text-xs font-bold tracking-widest uppercase pixelate mb-2 inline-block">
                            {{ $event->game->name ?? 'ESPORTS' }}
                        </span>
                        <h1 class="text-3xl md:text-5xl font-black text-white font-[Orbitron] mt-2">{{ $event->title }}</h1>
                    </div>
                </div>

                <!-- Description -->
                <div class="bg-black/40 border border-white/10 rounded-3xl p-8 backdrop-blur-sm">
                    <h2 class="text-2xl font-bold text-white font-[Orbitron] mb-4">About the Event</h2>
                    <div class="prose prose-invert max-w-none text-gray-400">
                        <p>{{ $event->description }}</p>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
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
                                    
                                    <form id="unregister-form" action="{{ route('events.unregister', $event) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button 
                                            type="button" 
                                            @click="$dispatch('open-confirmation-modal', { 
                                                title: 'Unregister from Event', 
                                                message: 'Are you sure you want to unregister? You will lose your spot in the tournament.', 
                                                action: 'unregister-form' 
                                            })"
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

                <!-- Match Result (if completed) -->
                @if($event->status === 'completed' && $event->matchResult)
                <div class="bg-black/40 border border-white/10 rounded-3xl p-6 backdrop-blur-sm">
                    <h3 class="text-lg font-bold text-white font-[Orbitron] mb-4">Winner</h3>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-lava-600 flex items-center justify-center text-white font-bold">
                            {{ substr($event->matchResult->winner->name ?? '?', 0, 1) }}
                        </div>
                        <div>
                            <div class="font-bold text-white">{{ $event->matchResult->winner->name ?? 'Unknown' }}</div>
                            <div class="text-xs text-gray-500">Score: {{ $event->matchResult->score_team_1 }} - {{ $event->matchResult->score_team_2 }}</div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
