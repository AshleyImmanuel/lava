<!-- Admin: Manage Events -->
<div class="space-y-6">
    <div class="flex items-center justify-between">
        <h3 class="text-xs font-bold uppercase tracking-widest text-gray-400">MANAGE EVENTS</h3>
        <a href="{{ route('admin.events.create') }}" class="inline-flex items-center px-4 py-2 rounded-xl bg-red-600 hover:bg-red-500 border border-red-400/60 text-white font-bold uppercase tracking-widest text-xs shadow-lg shadow-red-900/50 transition-all hover:scale-105">
            + Create Event
        </a>
    </div>

    <div class="bg-white/5 border border-white/10 rounded-2xl overflow-hidden backdrop-blur-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-left">
                <thead>
                    <tr class="border-b border-white/10 bg-white/5">
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Event</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Game</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Date</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Status</th>
                        <th class="px-6 py-4 text-xs font-bold text-gray-400 uppercase tracking-widest text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @foreach(\App\Models\Event::with('game')->latest('start_time')->paginate(15) as $event)
                    <tr class="hover:bg-white/5 transition-colors">
                        <td class="px-6 py-4">
                            <span class="text-white font-medium block">{{ $event->title }}</span>
                            <span class="text-xs text-gray-500">{{ Str::limit($event->description, 50) }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-2 py-1 rounded-md bg-white/10 text-xs font-bold text-white uppercase tracking-wider">{{ $event->game->name }}</span>
                        </td>
                        <td class="px-6 py-4 text-gray-400 text-sm">{{ $event->start_time->format('M d, Y H:i') }}</td>
                        <td class="px-6 py-4">
                            @if($event->status === 'ongoing' || $event->status === 'live')
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-green-500/20 text-green-400 border border-green-500/30">LIVE</span>
                            @elseif($event->status === 'upcoming')
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-blue-500/20 text-blue-400 border border-blue-500/30">UPCOMING</span>
                            @elseif($event->status === 'cancelled')
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-red-500/20 text-red-400 border border-red-500/30">CANCELLED</span>
                            @else
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-bold bg-gray-500/20 text-gray-400 border border-gray-500/30">COMPLETED</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('admin.events.edit', $event) }}" class="text-gray-400 hover:text-white transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                </a>
                                <form id="delete-event-{{ $event->id }}" action="{{ route('admin.events.destroy', $event) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" @click="$dispatch('open-confirmation-modal', { title: 'Delete Event', message: 'Are you sure you want to delete {{ $event->title }}?', action: 'delete-event-{{ $event->id }}' })" class="text-gray-400 hover:text-red-500 transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
