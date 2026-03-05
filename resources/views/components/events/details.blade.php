@props(['event'])

<!-- Description -->
<div class="bg-black/40 border border-white/10 rounded-3xl p-8 backdrop-blur-sm">
    <h2 class="text-2xl font-bold text-white font-[Orbitron] mb-4">About the Event</h2>
    <div class="prose prose-invert max-w-none text-gray-400">
        <p>{{ $event->description }}</p>
    </div>
</div>

<!-- Match Result (if completed) -->
@if($event->status === 'completed' && $event->matchResult)
<div class="bg-black/40 border border-white/10 rounded-3xl p-6 backdrop-blur-sm mt-8">
    <h3 class="text-lg font-bold text-white font-[Orbitron] mb-4">Winner</h3>
    <div class="flex items-center gap-4">
        <div class="w-12 h-12 rounded-full bg-lava-600 flex items-center justify-center text-white font-bold">
            {{ substr($event->matchResult->winner->name ?? '?', 0, 1) }}
        </div>
        <div>
            <div class="font-bold text-white">{{ $event->matchResult->winner->name ?? 'Unknown' }}</div>
            <div class="text-xs text-gray-500">Score: {{ $event->matchResult->score_team_1 }} - {{ $event->matchResult->score_team_2 }}</div>
        </div>
    </div>
</div>
@endif
