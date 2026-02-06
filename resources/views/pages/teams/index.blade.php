@extends('layouts.app')

@section('content')
<div class="relative min-h-screen pt-24 pb-12">
    <!-- Background Elements -->
    <!-- Background Elements (Removed to use Global Layout) -->

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="text-center mb-16 space-y-4">
            <h1 class="text-5xl md:text-7xl font-black text-white font-[Orbitron] tracking-tight">
                OUR <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-orange-500">ROSTER</span>
            </h1>
            <p class="text-xl text-gray-400 max-w-2xl mx-auto">
                Meet the elite athletes representing LAVA across the globe.
            </p>
        </div>

        <!-- Filter/Search Bar -->
        <div class="mb-12 flex flex-col md:flex-row gap-4 justify-between items-center bg-white/5 border border-white/10 p-4 rounded-2xl backdrop-blur-sm">
            <div class="flex gap-2 overflow-x-auto pb-2 md:pb-0 w-full md:w-auto">
                <a href="{{ route('teams.index') }}" 
                   class="px-6 py-2 rounded-xl font-bold text-sm tracking-widest transition-all {{ !request('game_id') ? 'bg-lava-600 text-white hover:bg-lava-500' : 'bg-white/5 text-gray-400 hover:bg-white/10 hover:text-white' }}">
                    ALL
                </a>
                @foreach($games as $game)
                    <a href="{{ route('teams.index', ['game_id' => $game->id]) }}" 
                       class="px-6 py-2 rounded-xl font-bold text-sm tracking-widest transition-all whitespace-nowrap {{ request('game_id') == $game->id ? 'bg-lava-600 text-white hover:bg-lava-500' : 'bg-white/5 text-gray-400 hover:bg-white/10 hover:text-white' }}">
                        {{ strtoupper($game->name == 'Counter-Strike 2' ? 'CS2' : ($game->name == 'League of Legends' ? 'LOL' : $game->name)) }}
                    </a>
                @endforeach
            </div>
            
            <form action="{{ route('teams.index') }}" method="GET" class="relative w-full md:w-64">
                @if(request('game_id'))
                    <input type="hidden" name="game_id" value="{{ request('game_id') }}">
                @endif
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search teams..." class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-2 pl-10 text-white placeholder-gray-500 focus:outline-none focus:border-lava-500 transition-colors">
                <svg class="w-4 h-4 text-gray-500 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
            </form>
        </div>

        <!-- Teams Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($teams as $team)
            <div class="group relative bg-black/40 border border-white/10 rounded-3xl overflow-hidden hover:border-lava-500/50 transition-all duration-500 tilt-card">
                <!-- Hover Glow -->
                <div class="absolute inset-0 bg-gradient-to-br from-lava-600/10 to-transparent opacity-0 group-hover:opacity-100 transition-duration-500 pointer-events-none"></div>

                <!-- Image Container -->
                <div class="relative h-64 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/20 to-transparent z-10"></div>
                    @if($team->logo_url)
                        <img src="{{ $team->logo_url }}" alt="{{ $team->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-gray-900 to-black flex items-center justify-center relative overflow-hidden">
                            <!-- Placeholder Pattern -->
                            <!-- Noise removed -->
                            <div class="absolute -bottom-10 -right-10 w-40 h-40 bg-lava-600/20 rounded-full blur-2xl"></div>
                            <svg class="w-24 h-24 text-white/10" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2L2 7l10 5 10-5-10-5zm0 9l2.5-1.25L12 8.75l-2.5 1.25L12 11zm0 2.5l-5-2.5-5 2.5L12 22l10-8.5-5-2.5-5 2.5z"/>
                            </svg>
                            <span class="absolute text-5xl font-black text-white/5 font-[Orbitron] scale-150 select-none">{{ substr($team->name, 0, 2) }}</span>
                        </div>
                    @endif
                    
                    <!-- Game Badge -->
                    <div class="absolute top-4 right-4 z-20">
                        <span class="px-3 py-1 rounded-lg bg-black/60 backdrop-blur-md border border-white/10 text-xs font-bold text-white tracking-widest uppercase pixelate">
                            {{ $team->game->nav_name ?? 'ESPORTS' }}
                        </span>
                    </div>
                </div>

                <!-- Content -->
                <div class="relative z-20 p-6 -mt-12">
                    <div class="bg-gray-900/90 backdrop-blur-xl border border-white/10 rounded-2xl p-6 shadow-xl">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-xl font-bold text-white font-[Orbitron] mb-1 group-hover:text-lava-400 transition-colors">{{ $team->name }}</h3>
                                <p class="text-sm text-gray-400">{{ $team->region ?? 'Global' }}</p>
                            </div>
                            <div class="text-right">
                                <span class="block text-2xl font-black text-white">{{ $team->members_count ?? 0 }}</span>
                                <span class="text-[10px] text-gray-500 uppercase tracking-wider">Players</span>
                            </div>
                        </div>

                        <!-- Roster Preview -->
                        <div class="flex items-center gap-2 mb-6">
                            @foreach($team->members->take(3) as $member)
                                <div class="w-8 h-8 rounded-full bg-gray-800 border-2 border-gray-900 overflow-hidden relative" title="{{ $member->user->name }}">
                                    @if($member->user->avatar_url ?? null)
                                        <img src="{{ $member->user->avatar_url }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-[10px] text-gray-400 font-bold bg-white/5">
                                            {{ substr($member->user->name, 0, 1) }}
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                            @if($team->members_count > 3)
                                <div class="w-8 h-8 rounded-full bg-gray-800 border-2 border-gray-900 flex items-center justify-center text-[10px] text-gray-400 font-bold">
                                    +{{ $team->members_count - 3 }}
                                </div>
                            @endif
                        </div>

                        <!-- Action -->
                        <a href="{{ route('teams.show', $team) }}" class="block w-full py-3 rounded-xl bg-white/5 text-center text-sm font-bold text-white uppercase tracking-widest border border-white/5 hover:bg-lava-600 hover:border-lava-500 transition-all group-hover:shadow-[0_0_20px_rgba(220,38,38,0.3)]">
                            View Roster
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-24 text-center">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-white/5 mb-6">
                    <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">No Teams Found</h3>
                <p class="text-gray-400">We're currently scouting for new talent.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-16">
            {{ $teams->links() }}
        </div>
    </div>
</div>
@endsection
