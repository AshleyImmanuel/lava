@extends('layouts.app')

@section('title', 'Create Recruitment Post - LAVA ESPORTS')

@section('content')
<div class="relative min-h-screen pt-24 pb-12">
    <div class="relative z-10 max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-10">
            <a href="{{ route('dashboard') }}" class="text-gray-400 hover:text-white text-sm font-bold uppercase tracking-widest transition-colors mb-4 inline-flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Back to Dashboard
            </a>
            <h1 class="text-4xl md:text-5xl font-black text-white font-[Orbitron] tracking-tight mt-4">
                CREATE <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-500">RECRUITMENT</span>
            </h1>
            <p class="text-gray-400 mt-2">Post a recruitment listing to find new players for your team.</p>
        </div>

        <!-- Success Message -->
        @if(session('success'))
        <div class="mb-6 p-4 rounded-xl bg-green-500/10 border border-green-500/30 text-green-400 font-semibold">
            {{ session('success') }}
        </div>
        @endif

        <!-- Form -->
        <form action="{{ route('recruitment.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Title -->
            <div>
                <label for="title" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2">Post Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required
                       class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-orange-500 transition-colors"
                       placeholder="e.g. VALORANT Duelist Tryouts">
                @error('title') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- Game -->
            <div>
                <label for="game_id" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2">Game</label>
                <select name="game_id" id="game_id" required
                        class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-orange-500 transition-colors">
                    <option value="">Select Game</option>
                    @foreach($games as $game)
                        <option value="{{ $game->id }}" {{ old('game_id') == $game->id ? 'selected' : '' }}>{{ $game->name }}</option>
                    @endforeach
                </select>
                @error('game_id') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- Team -->
            <div>
                <label for="team_id" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2">Team <span class="text-gray-600">(optional)</span></label>
                <select name="team_id" id="team_id"
                        class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-orange-500 transition-colors">
                    <option value="">Open Recruitment (No Specific Team)</option>
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}" {{ old('team_id') == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
                    @endforeach
                </select>
                @error('team_id') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- Role Needed -->
            <div>
                <label for="role_needed" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2">Role Needed</label>
                <input type="text" name="role_needed" id="role_needed" value="{{ old('role_needed') }}" required
                       class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-orange-500 transition-colors"
                       placeholder="e.g. Entry Fragger, Support, IGL">
                @error('role_needed') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2">Description</label>
                <textarea name="description" id="description" rows="5" required
                          class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-orange-500 transition-colors resize-none"
                          placeholder="Describe what you're looking for, practice schedule, expectations...">{{ old('description') }}</textarea>
                @error('description') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- Requirements -->
            <div>
                <label for="requirements" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2">Requirements <span class="text-gray-600">(optional)</span></label>
                <textarea name="requirements" id="requirements" rows="3"
                          class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-orange-500 transition-colors resize-none"
                          placeholder="e.g. Diamond+ rank, 18+ age, available weekdays...">{{ old('requirements') }}</textarea>
                @error('requirements') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- Deadline -->
            <div>
                <label for="deadline" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2">Application Deadline</label>
                <input type="datetime-local" name="deadline" id="deadline" value="{{ old('deadline') }}" required
                       class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-orange-500 transition-colors">
                @error('deadline') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- Submit -->
            <button type="submit" class="w-full py-4 rounded-xl font-black text-lg uppercase tracking-widest text-white transition-all duration-300 hover:scale-[1.02] active:scale-95"
                    style="background: linear-gradient(135deg, #f97316 0%, #ea580c 100%); box-shadow: 0 0 25px rgba(249, 115, 22, 0.4);">
                <svg class="w-5 h-5 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"/></svg> Publish Recruitment Post
            </button>
        </form>
    </div>
</div>
@endsection
