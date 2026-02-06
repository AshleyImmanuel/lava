@extends('layouts.app')

@section('content')
<div class="relative min-h-screen pt-24 pb-12 lava-bg">
    <!-- Background Elements -->
    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-lava-600/10 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-purple-600/10 rounded-full blur-[100px]"></div>
        <!-- Noise removed -->
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-8 slide-up">
            <h1 class="text-4xl font-black text-white font-[Orbitron] tracking-tight">
                ADMIN <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-orange-500">PANEL</span>
            </h1>
            <a href="{{ route('dashboard') }}" class="px-4 py-2 rounded-lg bg-white/5 hover:bg-white/10 text-gray-400 hover:text-white text-xs font-bold uppercase tracking-widest border border-white/10 transition-colors">
                Back to Dashboard
            </a>
        </div>

        <!-- Admin Nav -->
        <div class="flex gap-4 mb-8 border-b border-white/10 pb-4">
            <a href="{{ route('admin.users.index') }}" class="px-4 py-2 rounded-lg bg-white/10 text-white font-bold uppercase tracking-widest text-xs border border-white/20">Users</a>
            <a href="{{ route('admin.events.index') }}" class="px-4 py-2 rounded-lg hover:bg-white/5 text-gray-400 hover:text-white font-bold uppercase tracking-widest text-xs transition-colors">Events</a>
            <a href="{{ route('admin.teams.index') }}" class="px-4 py-2 rounded-lg hover:bg-white/5 text-gray-400 hover:text-white font-bold uppercase tracking-widest text-xs transition-colors">Teams</a>
        </div>

        <div class="bg-black/40 border border-white/10 rounded-2xl overflow-hidden backdrop-blur-md">
            <div class="overflow-x-auto">
                <table class="w-full text-left">
                    <thead>
                        <tr class="border-b border-white/10 bg-white/5">
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">User</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Email</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Role</th>
                            <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @foreach($users as $user)
                        <tr class="hover:bg-white/5 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-gradient-to-br from-gray-700 to-gray-800 flex items-center justify-center text-xs font-bold text-white">
                                        {{ substr($user->name, 0, 2) }}
                                    </div>
                                    <span class="text-white font-medium">{{ $user->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-gray-400 text-sm">{{ $user->email }}</td>
                            <td class="px-6 py-4">
                                @if($user->isRecruiter())
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-purple-500/20 text-purple-400 border border-purple-500/30">
                                        Recruiter
                                    </span>
                                @elseif($user->isAdmin())
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-red-500/20 text-red-400 border border-red-500/30">
                                        Admin
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-gray-500/20 text-gray-400 border border-gray-500/30">
                                        Player
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                @if(!$user->isAdmin())
                                    <div class="flex items-center justify-end gap-2">
                                        @if(!$user->isRecruiter())
                                            <form action="{{ route('admin.users.promote', $user) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="px-3 py-1.5 rounded-lg bg-lava-600 hover:bg-lava-500 text-white text-xs font-bold uppercase tracking-widest transition-colors">
                                                    Promote
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('admin.users.demote', $user) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="px-3 py-1.5 rounded-lg bg-white/5 hover:bg-white/10 text-gray-400 hover:text-white text-xs font-bold uppercase tracking-widest border border-white/10 transition-colors">
                                                    Demote
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            @if($users->hasPages())
            <div class="px-6 py-4 border-t border-white/5">
                {{ $users->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

