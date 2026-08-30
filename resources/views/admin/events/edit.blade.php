@extends('layouts.app')

@section('content')
<div class="relative min-h-screen pt-24 pb-12">
    <div class="fixed inset-0 pointer-events-none">
        <div class="absolute top-0 left-0 w-full h-[500px] bg-gradient-to-b from-lava-900/20 to-transparent"></div>
    </div>

    <div class="relative z-10 max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8 gap-3">
            <h1 class="text-3xl font-black text-white font-[Orbitron]">Edit Event</h1>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.events.index') }}" class="text-gray-400 hover:text-white transition-colors text-sm font-bold uppercase tracking-widest">Back to List</a>
                <button type="submit" form="edit-event-form" class="px-4 py-2 rounded-lg border border-red-300/30 bg-gradient-to-r from-red-600 to-orange-500 hover:from-red-500 hover:to-orange-400 text-white text-xs font-bold uppercase tracking-widest shadow-lg shadow-red-900/50 transition-all">
                    Update Event
                </button>
            </div>
        </div>

        <div class="bg-zinc-950/85 border border-white/20 ring-1 ring-white/10 rounded-2xl p-8 backdrop-blur-md shadow-2xl shadow-black/60">
            <form id="edit-event-form" action="{{ route('admin.events.update', $event) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="space-y-6">
                    <!-- Title -->
                    <div>
                        <label class="block text-xs text-gray-300 uppercase tracking-widest mb-2">Event Title</label>
                        <input type="text" name="title" value="{{ old('title', $event->title) }}" required class="w-full bg-zinc-900/80 border border-white/20 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:border-red-500 focus:ring-2 focus:ring-red-500/30 transition-colors">
                        @error('title')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Game & Type -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs text-gray-300 uppercase tracking-widest mb-2">Game</label>
                            <x-select
                                name="game_id"
                                :options="$games->pluck('name', 'id')->toArray()"
                                :value="old('game_id', $event->game_id)"
                                placeholder="Select game"
                            />
                        </div>
                        <div>
                            <label class="block text-xs text-gray-300 uppercase tracking-widest mb-2">Event Type</label>
                            <x-select
                                name="type"
                                :options="[
                                    'tournament' => 'Tournament',
                                    'tryout' => 'Tryout',
                                    'scrim' => 'Scrim',
                                    'friendly' => 'Friendly',
                                ]"
                                :value="old('type', $event->type)"
                                placeholder="Select event type"
                            />
                        </div>
                    </div>

                    <!-- Date & Status -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs text-gray-300 uppercase tracking-widest mb-2">Start Time</label>
                            <input type="datetime-local" name="start_time" value="{{ old('start_time', $event->start_time ? $event->start_time->format('Y-m-d\TH:i') : '') }}" required class="w-full bg-zinc-900/80 border border-white/20 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:border-red-500 focus:ring-2 focus:ring-red-500/30 transition-colors">
                        </div>
                        <div>
                            <label class="block text-xs text-gray-300 uppercase tracking-widest mb-2">Status</label>
                            <x-select
                                name="status"
                                :options="[
                                    'upcoming' => 'Upcoming',
                                    'ongoing' => 'Ongoing (Live)',
                                    'completed' => 'Completed',
                                    'cancelled' => 'Cancelled',
                                ]"
                                :value="old('status', $event->status)"
                                placeholder="Select status"
                            />
                        </div>
                    </div>

                    <!-- Details -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-xs text-gray-300 uppercase tracking-widest mb-2">Max Players</label>
                            <input type="number" name="max_players" value="{{ old('max_players', $event->max_players ?? '') }}" placeholder="50" class="w-full bg-zinc-900/80 border border-white/20 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:border-red-500 focus:ring-2 focus:ring-red-500/30 transition-colors">
                        </div>
                        <div>
                            <label class="block text-xs text-gray-300 uppercase tracking-widest mb-2">Entry Fee (INR)</label>
                            <input type="number" name="entry_fee" min="0" step="1" value="{{ old('entry_fee', $event->entry_fee ?? 0) }}" placeholder="0" class="w-full bg-zinc-900/80 border border-white/20 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:border-red-500 focus:ring-2 focus:ring-red-500/30 transition-colors">
                        </div>
                        <div>
                            <label class="block text-xs text-gray-300 uppercase tracking-widest mb-2">Prize Pool (INR)</label>
                            <input type="number" name="prize_pool" min="0" step="1" value="{{ old('prize_pool', $event->prize_pool ?? 0) }}" placeholder="10000" class="w-full bg-zinc-900/80 border border-white/20 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:border-red-500 focus:ring-2 focus:ring-red-500/30 transition-colors">
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <label class="block text-xs text-gray-300 uppercase tracking-widest mb-2">Description</label>
                        <textarea name="description" rows="5" required class="w-full bg-zinc-900/80 border border-white/20 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:border-red-500 focus:ring-2 focus:ring-red-500/30 transition-colors">{{ old('description', $event->description) }}</textarea>
                    </div>

                    <!-- Banner URL -->
                    <div>
                        <label class="block text-xs text-gray-300 uppercase tracking-widest mb-2">Banner Image URL</label>
                        <input type="url" name="image_path" list="edit-banner-defaults" value="{{ old('image_path', $event->image_path ?? '') }}" placeholder="https://..." class="w-full bg-zinc-900/80 border border-white/20 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:border-red-500 focus:ring-2 focus:ring-red-500/30 transition-colors">
                        <datalist id="edit-banner-defaults">
                            <option value="https://placehold.co/1200x630/111827/f9fafb?text=LAVA%20Event%20Banner"></option>
                            <option value="https://placehold.co/1200x630/7f1d1d/f9fafb?text=LAVA%20Tournament"></option>
                            <option value="https://placehold.co/1200x630/0f172a/f97316?text=LAVA%20Tryout"></option>
                            <option value="https://placehold.co/1200x630/1f2937/facc15?text=LAVA%20Scrim"></option>
                        </datalist>
                    </div>

                </div>
            </form>
        </div>
    </div>

</div>
@endsection
