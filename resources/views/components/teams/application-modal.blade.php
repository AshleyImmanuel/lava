@props(['team', 'themeColor'])

<!-- Modal -->
<div x-show="open" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
    <div class="flex min-h-screen items-center justify-center p-4 text-center">
        <div @click="open = false" class="fixed inset-0 bg-black/90 backdrop-blur-sm transition-opacity"></div>
        <div class="relative bg-zinc-900 border border-white/10 rounded-2xl p-8 max-w-lg w-full text-left shadow-2xl overflow-hidden">
            <div class="absolute top-0 inset-x-0 h-1 bg-gradient-to-r from-transparent via-{{ $themeColor }} to-transparent"></div>
            <h3 class="text-2xl font-black text-white font-[Orbitron] mb-6">Join Roster</h3>
            
            <form action="{{ route('teams.apply', $team) }}" method="POST" class="space-y-4">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-xs text-gray-400 uppercase font-bold mb-1 block">IGN</label>
                        <input type="text" name="ingame_name" required class="w-full bg-black/50 border border-white/10 rounded-lg px-4 py-2 text-white focus:border-{{ $themeColor }} focus:ring-1 focus:ring-{{ $themeColor }} outline-none transition-colors">
                    </div>
                    <div>
                        <label class="text-xs text-gray-400 uppercase font-bold mb-1 block">Wait ID / UID</label>
                        <input type="text" name="ingame_id" required class="w-full bg-black/50 border border-white/10 rounded-lg px-4 py-2 text-white focus:border-{{ $themeColor }} focus:ring-1 focus:ring-{{ $themeColor }} outline-none transition-colors">
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="text-xs text-gray-400 uppercase font-bold mb-1 block">Rank</label>
                        <input type="text" name="ingame_level" required class="w-full bg-black/50 border border-white/10 rounded-lg px-4 py-2 text-white focus:border-{{ $themeColor }} focus:ring-1 focus:ring-{{ $themeColor }} outline-none transition-colors">
                    </div>
                    <div>
                        <label class="text-xs text-gray-400 uppercase font-bold mb-1 block">Phone</label>
                        <input type="tel" name="phone_number" required class="w-full bg-black/50 border border-white/10 rounded-lg px-4 py-2 text-white focus:border-{{ $themeColor }} focus:ring-1 focus:ring-{{ $themeColor }} outline-none transition-colors">
                    </div>
                </div>
                <div>
                    <label class="text-xs text-gray-400 uppercase font-bold mb-1 block">Experience</label>
                    <textarea name="experience" rows="3" required class="w-full bg-black/50 border border-white/10 rounded-lg px-4 py-2 text-white focus:border-{{ $themeColor }} focus:ring-1 focus:ring-{{ $themeColor }} outline-none transition-colors"></textarea>
                </div>
                <input type="hidden" name="personal_email" value="{{ auth()->user()->email }}">
                
                <div class="flex justify-end gap-3 pt-4">
                    <button type="button" @click="open = false" class="px-4 py-2 rounded-lg text-gray-400 hover:text-white font-bold uppercase text-xs">Cancel</button>
                    <button type="submit" class="px-6 py-2 rounded-lg text-white font-bold uppercase text-xs transition-colors" style="background-color: {{ $themeColor }}">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
