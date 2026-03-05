@extends('layouts.app')

@section('content')
<div class="relative min-h-screen pt-24 pb-12">
    <div class="fixed inset-0 pointer-events-none">
        <div class="absolute top-0 left-0 w-full h-[500px] bg-gradient-to-b from-lava-900/20 to-transparent"></div>
    </div>

    <div class="relative z-10 max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-black text-white font-[Orbitron]">Edit Team</h1>
            <a href="{{ route('dashboard') }}?tab=admin-teams" class="text-gray-400 hover:text-white transition-colors text-sm font-bold uppercase tracking-widest">Back to Dashboard</a>
        </div>

        <div class="bg-black/40 border border-white/10 rounded-2xl p-8 backdrop-blur-md">
            <form action="{{ route('admin.teams.update', $team) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="space-y-6">
                    <div>
                        <label class="block text-xs text-gray-400 uppercase tracking-widest mb-2">Team Name</label>
                        <input type="text" name="name" value="{{ old('name', $team->name) }}" required class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:border-lava-500 focus:ring-1 focus:ring-lava-500 transition-colors">
                        @error('name') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs text-gray-400 uppercase tracking-widest mb-2">Game</label>
                            <x-select
                                name="game_id"
                                :options="$games->pluck('name', 'id')->toArray()"
                                :value="old('game_id', $team->game_id)"
                                placeholder="Select game"
                            />
                        </div>
                        <div>
                            <label class="block text-xs text-gray-400 uppercase tracking-widest mb-2">Region</label>
                            <input type="text" name="region" value="{{ old('region', $team->region) }}" placeholder="North America" class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:border-lava-500 focus:ring-1 focus:ring-lava-500 transition-colors">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs text-gray-400 uppercase tracking-widest mb-2">Description</label>
                        <textarea name="description" rows="5" class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:border-lava-500 focus:ring-1 focus:ring-lava-500 transition-colors">{{ old('description', $team->description) }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs text-gray-400 uppercase tracking-widest mb-2">Logo URL</label>
                        <input type="url" name="logo_url" value="{{ old('logo_url') ?: ($team->logo_url ?: 'https://placehold.co/512x512/111827/f9fafb?text=Team%20Logo') }}" placeholder="https://..." class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:border-lava-500 focus:ring-1 focus:ring-lava-500 transition-colors">
                    </div>

                    <div class="pt-4 flex justify-end">
                        <button type="submit" class="px-8 py-3 rounded-xl bg-lava-600 hover:bg-lava-500 text-white font-bold uppercase tracking-widest shadow-lg shadow-lava-900/50 transition-all hover:scale-105">
                            Update Team
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
