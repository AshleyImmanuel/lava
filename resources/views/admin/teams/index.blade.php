@extends('layouts.app')

@section('content')
<div class="relative min-h-screen pt-24 pb-12">
    <div class="fixed inset-0 pointer-events-none">
        <div class="absolute top-0 left-0 w-full h-[500px] bg-gradient-to-b from-lava-900/20 to-transparent"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-black text-white font-[Orbitron]">Admin Dashboard</h1>
            <div class="flex gap-4">
                <a href="{{ route('dashboard') }}" class="px-4 py-2 text-gray-400 hover:text-white transition-colors text-sm font-bold uppercase tracking-widest">Back to Player Dashboard</a>
                <a href="{{ route('admin.teams.create') }}" class="px-6 py-2 rounded-xl bg-lava-600 hover:bg-lava-500 text-white font-bold uppercase tracking-widest text-sm shadow-lg shadow-lava-900/50 transition-all hover:scale-105">
                    Create Team
                </a>
            </div>
        </div>

        <!-- Admin Nav -->
        <div class="flex gap-4 mb-8 border-b border-white/10 pb-4">
            <a href="{{ route('admin.users.index') }}" class="px-4 py-2 rounded-lg hover:bg-white/5 text-gray-400 hover:text-white font-bold uppercase tracking-widest text-xs transition-colors">Users</a>
            <a href="{{ route('admin.events.index') }}" class="px-4 py-2 rounded-lg hover:bg-white/5 text-gray-400 hover:text-white font-bold uppercase tracking-widest text-xs transition-colors">Events</a>
            <a href="{{ route('admin.teams.index') }}" class="px-4 py-2 rounded-lg bg-white/10 text-white font-bold uppercase tracking-widest text-xs border border-white/20">Teams</a>
        </div>

        <div class="bg-black/40 border border-white/10 rounded-2xl overflow-hidden backdrop-blur-md">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-white/10 bg-white/5">
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Team</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Game</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Region</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @foreach($teams as $team)
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    @if($team->logo_url)
                                        <img src="{{ $team->logo_url }}" alt="{{ $team->name }}" class="w-8 h-8 rounded object-cover bg-gray-800">
                                    @else
                                        <div class="w-8 h-8 rounded bg-gradient-to-br from-gray-700 to-gray-800 flex items-center justify-center text-[10px] font-bold text-white">
                                            {{ substr($team->name, 0, 2) }}
                                        </div>
                                    @endif
                                    <span class="text-white font-medium">{{ $team->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2 py-1 rounded-md bg-white/10 text-xs font-bold text-white uppercase tracking-wider">
                                    {{ $team->game->name }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-400 text-sm">
                                {{ $team->region ?? 'Global' }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="{{ route('admin.teams.edit', $team) }}" class="text-gray-400 hover:text-white transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                    </a>
                                    <form action="{{ route('admin.teams.destroy', $team) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-gray-400 hover:text-red-500 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            @if($teams->hasPages())
            <div class="px-6 py-4 border-t border-white/5">
                {{ $teams->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
