@extends('layouts.app')

@section('title', 'Manage Invitations - LAVA ESPORTS')

@section('content')
<div class="relative min-h-screen pt-24 pb-12">
    <!-- Background Ambience -->
    <div class="fixed inset-0 pointer-events-none">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-lava-600/10 rounded-full blur-[100px]"></div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-ember-600/10 rounded-full blur-[100px]"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
            <div>
                <h1 class="text-4xl font-black text-white font-[Orbitron] mb-2">
                    RECRUITMENT <span class="text-lava-500">CENTER</span>
                </h1>
                <p class="text-gray-400">Generate and manage invitation codes for new players.</p>
            </div>
            
            <form action="{{ route('invitations.store') }}" method="POST">
                @csrf
                <button type="submit" class="btn-lava px-8 py-3 text-white font-bold uppercase tracking-widest rounded-xl transition-all shadow-[0_4px_15px_rgba(239,68,68,0.3)] hover:shadow-[0_8px_25px_rgba(239,68,68,0.5)]">
                    <span class="relative z-10 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Generate New Code
                    </span>
                </button>
            </form>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="glass-card p-6 rounded-2xl border border-white/5">
                <div class="text-sm font-bold uppercase tracking-widest mb-2" style="color: #9ca3af;">Total Invites</div>
                <div class="text-4xl font-black text-white">{{ $invitations->total() }}</div>
            </div>
            <div class="glass-card p-6 rounded-2xl border border-white/5">
                <div class="text-sm font-bold uppercase tracking-widest mb-2" style="color: #9ca3af;">Active Codes</div>
                <div class="text-4xl font-black" style="color: #f97316;">{{ $invitations->where('expires_at', '>', now())->count() }}</div>
            </div>
            <div class="glass-card p-6 rounded-2xl border border-white/5">
                <div class="text-sm font-bold uppercase tracking-widest mb-2" style="color: #9ca3af;">Players Recruited</div>
                <div class="text-4xl font-black" style="color: #f59e0b;">{{ $invitations->sum('used_count') }}</div>
            </div>
        </div>

        <!-- Invitations List -->
        <div class="glass-card rounded-2xl border border-white/5 overflow-hidden">
            <div class="px-6 py-4 border-b border-white/5 bg-white/5 flex items-center justify-between">
                <h2 class="font-[Orbitron] font-bold text-white tracking-widest">INVITATION HISTORY</h2>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-white/5 text-xs uppercase tracking-widest" style="color: #9ca3af;">
                            <th class="px-6 py-4 font-bold">Code</th>
                            <th class="px-6 py-4 font-bold">Registration Link</th>
                            <th class="px-6 py-4 font-bold">Uses</th>
                            <th class="px-6 py-4 font-bold">Expires</th>
                            <th class="px-6 py-4 font-bold text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @forelse($invitations as $invite)
                            <tr class="hover:bg-white/5 transition-colors group">
                                <td class="px-6 py-4">
                                    <span class="font-mono text-xl font-bold text-white tracking-wider select-all">{{ $invite->code }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <input type="text" readonly value="{{ route('register', ['referral_code' => $invite->code]) }}" 
                                            class="bg-black/30 border border-white/10 rounded px-2 py-1 text-xs text-gray-400 w-64 focus:outline-none focus:border-lava-500 select-all">
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-white font-bold">{{ $invite->used_count }}</span>
                                    <span class="text-gray-500 text-xs">players</span>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-400">
                                    {{ $invite->expires_at->format('M d, Y h:i A') }}
                                    <div class="text-xs text-gray-600">{{ $invite->expires_at->diffForHumans() }}</div>
                                </td>
                                <td class="px-6 py-4 text-right">
                                    @if($invite->isValid())
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-green-500/20 text-green-400 border border-green-500/30">
                                            Active
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-red-500/20 text-red-400 border border-red-500/30">
                                            Expired
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center" style="color: #9ca3af;">
                                    <div class="flex flex-col items-center justify-center gap-3">
                                        <svg class="w-12 h-12 opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                                        </svg>
                                        <p>No invitations generated yet.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($invitations->hasPages())
                <div class="px-6 py-4 border-t border-white/5 bg-white/5">
                    {{ $invitations->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
