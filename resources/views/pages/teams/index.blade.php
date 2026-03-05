@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <x-teams.index-hero />

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-12">
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
        <div id="teams-container">
            @include('pages.teams._teams_grid')
        </div>

        <!-- Pagination -->
        <div class="mt-16">
            {{ $teams->links() }}
        </div>
    </div>

@include('pages.teams.partials.scripts')
@endsection
