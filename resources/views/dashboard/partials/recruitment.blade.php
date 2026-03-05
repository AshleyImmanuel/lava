<!-- Recruitment Center for Recruiters -->
<div class="space-y-8">
    <div class="bg-white/5 border border-white/10 rounded-3xl p-6 backdrop-blur-sm">
        <h3 class="text-xs font-bold uppercase tracking-widest mb-6 text-gray-400">CREATE RECRUITMENT POST</h3>

        <!-- Success Message -->
        @if(session('success'))
        <div class="mb-6 p-4 rounded-xl bg-green-500/10 border border-green-500/30 text-green-400 font-semibold">
            {{ session('success') }}
        </div>
        @endif

        <form action="{{ route('recruitment.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Title -->
            <div>
                <label for="title" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2">Post Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required
                       class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-orange-500 transition-colors"
                       placeholder="e.g. VALORANT Duelist Tryouts">
                @error('title') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <!-- Game -->
                <div>
                    <label for="game_id" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2">Game</label>
                    <select name="game_id" id="game_id" required
                            class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-orange-500 transition-colors">
                        <option value="" class="bg-[#111] text-gray-400">Select Game</option>
                        @foreach(\App\Models\Game::all() as $game)
                            <option value="{{ $game->id }}" class="bg-[#111] text-white" {{ old('game_id') == $game->id ? 'selected' : '' }}>{{ $game->name }}</option>
                        @endforeach
                    </select>
                    @error('game_id') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Team -->
                <div>
                    <label for="team_id" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2">Team <span class="text-gray-600">(optional)</span></label>
                    <select name="team_id" id="team_id"
                            class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-orange-500 transition-colors">
                        <option value="" class="bg-[#111] text-gray-400">Open Recruitment</option>
                        @foreach(\App\Models\Team::all() as $team)
                            <option value="{{ $team->id }}" class="bg-[#111] text-white" {{ old('team_id') == $team->id ? 'selected' : '' }}>{{ $team->name }}</option>
                        @endforeach
                    </select>
                    @error('team_id') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                <!-- Role Needed -->
                <div>
                    <label for="role_needed" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2">Role Needed</label>
                    <input type="text" name="role_needed" id="role_needed" value="{{ old('role_needed') }}" required
                           class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-orange-500 transition-colors"
                           placeholder="e.g. Entry Fragger, Support">
                    @error('role_needed') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
                </div>

                <!-- Deadline -->
                <div>
                    <label for="deadline" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2">Application Deadline</label>
                    <input type="datetime-local" name="deadline" id="deadline" value="{{ old('deadline') }}" required
                           style="color-scheme: dark;"
                           class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-orange-500 transition-colors">
                    @error('deadline') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2">Description</label>
                <textarea name="description" id="description" rows="4" required
                          class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-orange-500 transition-colors resize-none"
                          placeholder="Describe what you're looking for...">{{ old('description') }}</textarea>
                @error('description') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- Requirements -->
            <div>
                <label for="requirements" class="block text-xs font-bold uppercase tracking-widest text-gray-400 mb-2">Requirements <span class="text-gray-600">(optional)</span></label>
                <textarea name="requirements" id="requirements" rows="3"
                          class="w-full bg-black/40 border border-white/10 rounded-xl px-4 py-3 text-white placeholder-gray-500 focus:outline-none focus:border-orange-500 transition-colors resize-none"
                          placeholder="e.g. Diamond+ rank, 18+ age...">{{ old('requirements') }}</textarea>
                @error('requirements') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <!-- Submit -->
            <button type="submit" class="w-full py-4 rounded-xl font-black text-lg uppercase tracking-widest text-white transition-all duration-300 hover:scale-[1.02] active:scale-95"
                    style="background: linear-gradient(135deg, #f97316 0%, #ea580c 100%); box-shadow: 0 0 25px rgba(249, 115, 22, 0.4);">
                <svg class="w-5 h-5 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.879 16.121A3 3 0 1012.015 11L11 14H9c0 .768.293 1.536.879 2.121z"/></svg> Publish Recruitment Post
            </button>
        </form>
    </div>

    <!-- My Recruitment Posts -->
    @php
        $myPosts = \App\Models\RecruitmentPost::where('recruiter_id', Auth::id())->latest()->get();
    @endphp
    @if($myPosts->count() > 0)
    <div class="bg-white/5 border border-white/10 rounded-3xl p-6 backdrop-blur-sm">
        <h3 class="text-xs font-bold uppercase tracking-widest mb-4 text-gray-400">MY RECRUITMENT POSTS</h3>
        <div class="space-y-6">
            @foreach($myPosts as $post)
            <div class="bg-black/30 rounded-2xl border border-white/5 overflow-hidden">
                <!-- Post Header -->
                <div class="flex items-center justify-between p-5 border-b border-white/5 bg-white/5">
                    <div>
                        <h4 class="text-white font-bold text-lg mb-1">{{ $post->title }}</h4>
                        <div class="flex flex-wrap items-center gap-3 text-xs text-gray-400">
                            <span class="px-2 py-0.5 rounded bg-white/10 font-bold text-gray-300">{{ $post->game->name }}</span>
                            <span class="flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                {{ $post->role_needed }}
                            </span>
                            <span>Deadline: {{ $post->deadline->format('M d, Y') }}</span>
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-widest
                                {{ $post->status === 'open' ? 'bg-green-500/20 text-green-400 border border-green-500/30' : 'bg-gray-500/20 text-gray-400 border border-gray-500/30' }}">
                                {{ $post->status }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Applications List -->
                <div class="p-5">
                    <h5 class="text-[10px] font-bold uppercase tracking-widest text-gray-500 mb-3">Applicants ({{ $post->applications->count() }})</h5>
                    
                    @if($post->applications->count() > 0)
                        <div class="grid grid-cols-1 gap-3">
                            @foreach($post->applications()->with('user')->get() as $app)
                                <div class="bg-black/40 border {{ $app->status === 'approved' ? 'border-green-500/30 shadow-[0_0_15px_rgba(34,197,94,0.1)]' : ($app->status === 'rejected' ? 'border-red-500/30' : 'border-white/10') }} rounded-xl p-4 transition-all hover:border-white/20">
                                    <div class="flex flex-col md:flex-row md:items-start justify-between gap-4">
                                        
                                        <!-- Applicant Info -->
                                        <div class="flex gap-4">
                                            @if($app->user->profile_photo_url)
                                                <img src="{{ $app->user->profile_photo_url }}" alt="{{ $app->user->name }}" class="w-12 h-12 rounded-lg object-cover border border-white/10">
                                            @else
                                                <div class="w-12 h-12 rounded-lg bg-[#111] border border-white/10 flex items-center justify-center">
                                                    <span class="text-lg font-black font-[Orbitron] text-gray-500">{{ substr($app->user->name, 0, 1) }}</span>
                                                </div>
                                            @endif
                                            
                                            <div>
                                                <div class="flex items-center gap-2 mb-1">
                                                    <h6 class="text-white font-bold">{{ $app->ingame_name }}</h6>
                                                    <span class="text-xs text-gray-500">({{ $app->ingame_id }})</span>
                                                    @if($app->status === 'approved')
                                                        <span class="ml-2 px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-widest bg-green-500/20 text-green-400 border border-green-500/30">Approved</span>
                                                    @elseif($app->status === 'rejected')
                                                        <span class="ml-2 px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-widest bg-red-500/20 text-red-400 border border-red-500/30">Rejected</span>
                                                    @else
                                                        <span class="ml-2 px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-widest bg-orange-500/20 text-orange-400 border border-orange-500/30">Pending</span>
                                                    @endif
                                                </div>
                                                <div class="text-xs text-gray-400 space-y-1">
                                                    <p><strong class="text-gray-500">Rank/Level:</strong> <span class="text-orange-400">{{ $app->ingame_level }}</span></p>
                                                    <p><strong class="text-gray-500">Experience:</strong> {{ Str::limit($app->experience, 80) }}</p>
                                                    @if($app->message)
                                                        <p><strong class="text-gray-500">Msg:</strong> "{{ Str::limit($app->message, 80) }}"</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Application Actions -->
                                        <div class="flex flex-wrap items-center gap-2 md:justify-end shrink-0 pt-2 md:pt-0 border-t border-white/5 md:border-t-0">
                                            <!-- View Full Details Modal Trigger (Optional enhancement for later) -->
                                            <!-- <button class="px-3 py-1.5 rounded-lg text-xs font-bold text-gray-300 hover:text-white bg-white/5 hover:bg-white/10 border border-white/10 transition-colors">Details</button> -->
                                            
                                            @if($app->status === 'pending')
                                                <!-- Approve -->
                                                <form action="{{ route('recruitment.applications.approve', $app) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" class="px-4 py-1.5 rounded-lg text-xs font-bold text-white bg-green-500/80 hover:bg-green-500 transition-colors shadow-[0_0_10px_rgba(34,197,94,0.3)] hover:shadow-[0_0_15px_rgba(34,197,94,0.5)]">
                                                        Approve
                                                    </button>
                                                </form>
                                                <!-- Reject -->
                                                <form action="{{ route('recruitment.applications.reject', $app) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" class="px-4 py-1.5 rounded-lg text-xs font-bold text-red-400 hover:text-white bg-red-900/40 hover:bg-red-600 transition-colors border border-red-500/30">
                                                        Reject
                                                    </button>
                                                </form>
                                            @elseif($app->status === 'approved')
                                                <!-- Kick -->
                                                <form action="{{ route('recruitment.applications.kick', $app) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to remove this player?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="px-4 py-1.5 rounded-lg text-xs font-bold text-red-400 hover:text-white bg-red-900/20 hover:bg-red-600 transition-colors border border-red-500/30">
                                                        Remove / Kick
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-6 border border-dashed border-white/10 rounded-xl bg-black/20">
                            <svg class="w-8 h-8 mx-auto text-gray-600 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                            <p class="text-sm font-bold text-gray-500">No applications yet.</p>
                            <p class="text-[10px] text-gray-600 uppercase tracking-widest mt-1">Share your post link to get players</p>
                        </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
