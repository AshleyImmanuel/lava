@extends('layouts.app')

@section('content')
<div class="relative min-h-screen pt-24 pb-12">
    <div class="fixed inset-0 pointer-events-none">
        <div class="absolute top-0 left-0 w-full h-[500px] bg-gradient-to-b from-lava-900/20 to-transparent"></div>
    </div>

    <div class="relative z-10 max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-3xl font-black text-white font-[Orbitron]">Create New Event</h1>
            <a href="{{ route('admin.events.index') }}" class="text-gray-400 hover:text-white transition-colors text-sm font-bold uppercase tracking-widest">Back to List</a>
        </div>

        <div class="bg-black/40 border border-white/10 rounded-2xl p-8 backdrop-blur-md">
            <form action="{{ route('admin.events.store') }}" method="POST">
                @csrf
                
                <div class="space-y-6">
                    <!-- Title -->
                    <div>
                        <label class="block text-xs text-gray-400 uppercase tracking-widest mb-2">Event Title</label>
                        <input type="text" name="title" required class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:border-lava-500 focus:ring-1 focus:ring-lava-500 transition-colors">
                    </div>

                    <!-- Game & Type -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs text-gray-400 uppercase tracking-widest mb-2">Game</label>
                            <select name="game_id" required class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-lava-500 focus:ring-1 focus:ring-lava-500 transition-colors">
                                @foreach($games as $game)
                                    <option value="{{ $game->id }}">{{ $game->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs text-gray-400 uppercase tracking-widest mb-2">Event Type</label>
                            <select name="type" required class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-lava-500 focus:ring-1 focus:ring-lava-500 transition-colors">
                                <option value="online">Online Tournament</option>
                                <option value="offline">LAN / Offline</option>
                            </select>
                        </div>
                    </div>

                    <!-- Date & Status -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs text-gray-400 uppercase tracking-widest mb-2">Start Time</label>
                            <input type="datetime-local" name="start_time" required class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:border-lava-500 focus:ring-1 focus:ring-lava-500 transition-colors">
                        </div>
                        <div>
                            <label class="block text-xs text-gray-400 uppercase tracking-widest mb-2">Status</label>
                            <select name="status" required class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-lava-500 focus:ring-1 focus:ring-lava-500 transition-colors">
                                <option value="upcoming">Upcoming</option>
                                <option value="live">Live Now</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>
                    </div>

                    <!-- Details -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-xs text-gray-400 uppercase tracking-widest mb-2">Prize Pool</label>
                            <input type="text" name="prize_pool" placeholder="$10,000" class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:border-lava-500 focus:ring-1 focus:ring-lava-500 transition-colors">
                        </div>
                        <div>
                            <label class="block text-xs text-gray-400 uppercase tracking-widest mb-2">Max Teams</label>
                            <input type="number" name="max_teams" placeholder="16" class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:border-lava-500 focus:ring-1 focus:ring-lava-500 transition-colors">
                        </div>
                        <div>
                            <label class="block text-xs text-gray-400 uppercase tracking-widest mb-2">Location (Optional)</label>
                            <input type="text" name="location" placeholder="New York, NY" class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:border-lava-500 focus:ring-1 focus:ring-lava-500 transition-colors">
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-xs text-gray-400 uppercase tracking-widest mb-2">Description</label>
                        <textarea name="description" rows="5" required class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:border-lava-500 focus:ring-1 focus:ring-lava-500 transition-colors"></textarea>
                    </div>

                    <!-- Banner URL -->
                    <div>
                        <label class="block text-xs text-gray-400 uppercase tracking-widest mb-2">Banner Image URL</label>
                        <input type="url" name="banner_url" placeholder="https://..." class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-600 focus:border-lava-500 focus:ring-1 focus:ring-lava-500 transition-colors">
                    </div>

                    <div class="pt-4 flex justify-end">
                        <button type="submit" class="px-8 py-3 rounded-xl bg-lava-600 hover:bg-lava-500 text-white font-bold uppercase tracking-widest shadow-lg shadow-lava-900/50 transition-all hover:scale-105">
                            Create Event
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
