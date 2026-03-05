@props(['team', 'themeColor'])

@auth
    @php
        $userMember = $team->members->where('user_id', auth()->id())->first();
        $isLeader = ($userMember && $userMember->role === 'igl') || auth()->user()->isAdmin();
    @endphp
    @if($isLeader && $team->applications->where('status', 'pending')->count() > 0)
    <div class="mb-12">
            <div class="flex items-center gap-4 mb-6">
            <span class="text-3xl font-black text-white font-[Orbitron]">Requests</span>
            <div class="bg-{{ $themeColor }} px-3 py-1 rounded-full text-xs font-bold text-white" style="background-color: {{ $themeColor }}">
                {{ $team->applications->where('status', 'pending')->count() }} Pending
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach($team->applications->where('status', 'pending') as $application)
            <div class="bg-zinc-900/80 backdrop-blur border border-white/10 rounded-xl p-6 relative group hover:border-white/30 transition-all">
                <div class="absolute top-0 left-0 w-1 h-full rounded-l-xl transition-colors" style="background-color: {{ $themeColor }}40"></div>
                
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <h3 class="text-lg font-bold text-white">{{ $application->ingame_name }}</h3>
                        <div class="text-xs text-gray-400 font-mono mt-1">{{ $application->ingame_id }}</div>
                    </div>
                        <span class="px-2 py-1 rounded bg-white/5 text-[10px] font-bold text-white uppercase">{{ $application->ingame_level }}</span>
                </div>
                
                <p class="text-sm text-gray-400 italic mb-6">"{{ Str::limit($application->message ?: $application->experience, 80) }}"</p>
                
                <div class="flex gap-2">
                        <form action="{{ route('applications.accept', $application) }}" method="POST" class="flex-1">
                        @csrf
                        <button class="w-full py-2 rounded bg-green-500/10 text-green-500 border border-green-500/20 hover:bg-green-500 hover:text-white font-bold text-xs uppercase transition-all">Accept</button>
                    </form>
                    <form action="{{ route('applications.reject', $application) }}" method="POST" class="flex-1">
                        @csrf
                        <button class="w-full py-2 rounded bg-red-500/10 text-red-500 border border-red-500/20 hover:bg-red-500 hover:text-white font-bold text-xs uppercase transition-all">Reject</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
@endauth
