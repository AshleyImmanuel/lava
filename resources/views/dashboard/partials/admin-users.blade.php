<!-- Admin: Manage Users -->
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h3 class="text-xs font-bold uppercase tracking-widest text-gray-400">MANAGE USERS</h3>
    </div>

    <div class="bg-white/5 border border-white/10 rounded-2xl overflow-hidden backdrop-blur-sm">
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
                    @foreach(\App\Models\User::paginate(15) as $user)
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
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-purple-500/20 text-purple-400 border border-purple-500/30">Recruiter</span>
                            @elseif($user->isAdmin())
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-red-500/20 text-red-400 border border-red-500/30">Admin</span>
                            @else
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-gray-500/20 text-gray-400 border border-gray-500/30">Player</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            @if(!$user->isAdmin())
                                <div class="flex items-center justify-end gap-2">
                                    @if(!$user->isRecruiter())
                                        <form action="{{ route('admin.users.promote', $user) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="px-3 py-1.5 rounded-lg bg-lava-600 hover:bg-lava-500 text-white text-xs font-bold uppercase tracking-widest transition-colors">Promote</button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.users.demote', $user) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="px-3 py-1.5 rounded-lg bg-white/5 hover:bg-white/10 text-gray-400 hover:text-white text-xs font-bold uppercase tracking-widest border border-white/10 transition-colors">Demote</button>
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
    </div>
</div>
