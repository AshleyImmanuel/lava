@extends('layouts.app')

@section('title', $post->title . ' - Recruitment | LAVA ESPORTS')

@section('content')
<div class="relative min-h-screen pt-24 pb-12">
    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Back Link -->
        <a href="{{ route('events.index') }}" class="text-gray-400 hover:text-white text-sm font-bold uppercase tracking-widest transition-colors mb-6 inline-flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Back to Events
        </a>

        <!-- Header Card -->
        <div class="bg-black/40 border border-white/10 rounded-3xl overflow-hidden mt-4">
            <!-- Top Banner -->
            <div class="relative h-48 bg-gradient-to-br from-orange-900/50 via-red-900/30 to-black flex items-center justify-center">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
                <div class="relative z-10 text-center">
                    <svg class="w-16 h-16 text-orange-500/60 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                    <span class="text-xs font-black tracking-widest text-orange-400 uppercase">Player Recruitment</span>
                </div>

                <!-- Badges -->
                <div class="absolute top-4 left-4 z-20">
                    <span class="px-3 py-1 rounded-lg bg-black/60 backdrop-blur-md border border-white/10 text-xs font-bold text-white tracking-widest uppercase">
                        {{ $post->game->name ?? 'ESPORTS' }}
                    </span>
                </div>
                <div class="absolute top-4 right-4 z-20">
                    <span class="px-3 py-1 rounded-lg backdrop-blur-md border text-xs font-bold tracking-widest uppercase
                        {{ $post->status === 'open' ? 'bg-green-500/20 text-green-400 border-green-500/30' : 'bg-gray-500/20 text-gray-400 border-gray-500/30' }}">
                        {{ $post->status }}
                    </span>
                </div>
            </div>

            <!-- Content -->
            <div class="p-8 md:p-10">
                <h1 class="text-3xl md:text-4xl font-black text-white font-[Orbitron] tracking-tight mb-4">{{ $post->title }}</h1>

                <!-- Meta Info -->
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8 p-4 bg-white/5 rounded-2xl border border-white/10">
                    <div class="text-center">
                        <div class="text-[10px] uppercase tracking-widest mb-1 font-bold text-gray-500">Role Needed</div>
                        <div class="text-sm font-black text-orange-400 font-[Orbitron]">{{ $post->role_needed }}</div>
                    </div>
                    <div class="text-center">
                        <div class="text-[10px] uppercase tracking-widest mb-1 font-bold text-gray-500">Team</div>
                        <div class="text-sm font-black text-white font-[Orbitron]">{{ $post->team->name ?? 'Open' }}</div>
                    </div>
                    <div class="text-center">
                        <div class="text-[10px] uppercase tracking-widest mb-1 font-bold text-gray-500">Deadline</div>
                        <div class="text-sm font-bold text-red-400">{{ $post->deadline->format('M d, Y') }}</div>
                    </div>
                    <div class="text-center">
                        <div class="text-[10px] uppercase tracking-widest mb-1 font-bold text-gray-500">Posted By</div>
                        <div class="text-sm font-bold text-gray-300">{{ $post->recruiter->name }}</div>
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-8">
                    <h3 class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-3">Description</h3>
                    <div class="text-gray-300 leading-relaxed whitespace-pre-line">{{ $post->description }}</div>
                </div>

                <!-- Requirements -->
                @if($post->requirements)
                <div class="mb-8">
                    <h3 class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-3">Requirements</h3>
                    <div class="text-gray-300 leading-relaxed whitespace-pre-line bg-white/5 border border-white/10 rounded-xl p-4">{{ $post->requirements }}</div>
                </div>
                @endif

                <!-- Time Info & Actions -->
                <div class="flex items-center justify-between border-t border-white/5 pt-6 mt-6">
                    <div class="flex items-center gap-4 text-sm text-gray-500">
                        <span>Posted {{ $post->created_at->diffForHumans() }}</span>
                        <span>•</span>
                        <span class="{{ $post->deadline->isPast() ? 'text-red-500' : '' }}">
                            Deadline {{ $post->deadline->diffForHumans() }}
                        </span>
                    </div>

                    @auth
                        @if(!$post->deadline->isPast() && $post->status === 'open')
                            @php
                                $hasApplied = $post->applications()->where('user_id', Auth::id())->exists();
                            @endphp

                            @if($hasApplied)
                                <button disabled class="px-6 py-3 rounded-xl bg-green-500/20 text-green-400 border border-green-500/30 font-bold uppercase tracking-widest text-sm flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    Applied
                                </button>
                            @else
                                <button onclick="document.getElementById('applyModal').showModal()"
                                        class="px-8 py-3 rounded-xl font-black text-sm uppercase tracking-widest text-white transition-all duration-300 hover:scale-105 active:scale-95"
                                        style="background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);">
                                    Apply Now
                                </button>
                            @endif
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="px-8 py-3 rounded-xl bg-white/10 hover:bg-white/20 text-white font-bold uppercase tracking-widest text-sm transition-colors border border-white/10">
                            Login to Apply
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Application Modal -->
@auth
<dialog id="applyModal" class="bg-transparent m-auto p-0 backdrop:bg-black/80 backdrop:backdrop-blur-sm open:flex w-full max-w-2xl hidden">
    <div class="w-full bg-[#0a0a0a] border border-white/10 rounded-3xl p-8 relative shadow-2xl">
        <button onclick="document.getElementById('applyModal').close()" class="absolute top-6 right-6 text-gray-500 hover:text-white transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>

        <h3 class="text-2xl font-black text-white font-[Orbitron] uppercase tracking-wider mb-2">Apply for <span class="text-orange-500">{{ $post->role_needed }}</span></h3>
        <p class="text-gray-400 text-sm mb-6">Fill out your gaming profile below for {{ $post->team->name ?? 'Open Recruitment' }}.</p>

        <form action="{{ route('recruitment.apply', $post) }}" method="POST" class="space-y-4">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2">In-Game Name</label>
                    <input type="text" name="ingame_name" required value="{{ old('ingame_name', Auth::user()->gamer_tag) }}"
                           class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-orange-500 focus:outline-none placeholder-gray-600">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2">In-Game ID (e.g. Riot ID)</label>
                    <input type="text" name="ingame_id" required value="{{ old('ingame_id') }}"
                           class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-orange-500 focus:outline-none placeholder-gray-600">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2">Phone Number</label>
                    <input type="tel" name="phone_number" required value="{{ old('phone_number') }}"
                           class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-orange-500 focus:outline-none placeholder-gray-600">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2">Current Rank / Level</label>
                    <input type="text" name="ingame_level" required value="{{ old('ingame_level') }}"
                           class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-orange-500 focus:outline-none placeholder-gray-600">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2">Personal Email</label>
                <input type="email" name="personal_email" required value="{{ old('personal_email', Auth::user()->email) }}"
                       class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white focus:border-orange-500 focus:outline-none placeholder-gray-600">
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2">Competitive Experience</label>
                <textarea name="experience" required rows="3"
                          class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white resize-none focus:border-orange-500 focus:outline-none placeholder-gray-600"
                          placeholder="List your past teams, tournament results, and overall experience..."></textarea>
            </div>
            
            <div>
                <label class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2">Message to Recruiter (Optional)</label>
                <textarea name="message" rows="2"
                          class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white resize-none focus:border-orange-500 focus:outline-none placeholder-gray-600"
                          placeholder="Any extra context or VOD links?"></textarea>
            </div>

            <div class="pt-4 flex justify-end gap-3">
                <button type="button" onclick="document.getElementById('applyModal').close()" class="px-6 py-3 rounded-xl border border-white/10 text-white hover:bg-white/5 transition-colors font-bold uppercase tracking-widest text-sm">Cancel</button>
                <button type="submit" class="px-8 py-3 rounded-xl font-black text-sm uppercase tracking-widest text-white transition-all duration-300 hover:scale-105 active:scale-95"
                        style="background: linear-gradient(135deg, #f97316 0%, #ea580c 100%);">Submit Application</button>
            </div>
        </form>
    </div>
</dialog>
@endauth
@endsection
