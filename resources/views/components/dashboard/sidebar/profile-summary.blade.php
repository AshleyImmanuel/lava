<div class="flex flex-col items-center text-center p-6 bg-white/5 border border-white/10 rounded-3xl backdrop-blur-sm">
    <div class="relative w-24 h-24 mb-4 group">
        <div class="absolute inset-0 bg-gradient-to-br from-red-600 to-orange-600 rounded-2xl blur opacity-20 group-hover:opacity-40 transition-opacity"></div>
        <div class="relative w-full h-full rounded-2xl bg-gradient-to-br from-gray-800 to-black p-1">
            <div class="w-full h-full rounded-xl bg-gray-900 flex items-center justify-center border border-white/10 overflow-hidden">
                @if(Auth::user()->avatar_url)
                    <img src="{{ Auth::user()->avatar_url }}" alt="{{ Auth::user()->name }}" class="w-full h-full object-cover">
                @else
                    <span class="text-3xl font-bold text-white font-[Orbitron]">{{ substr(Auth::user()->name, 0, 1) }}</span>
                @endif
            </div>
        </div>
        <!-- Online Indicator -->
        <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-green-500 border-2 border-black rounded-full"></div>
    </div>
    
    <h2 class="text-xl font-bold text-white font-[Orbitron] mb-1">{{ Auth::user()->name }}</h2>
    <p class="text-xs font-bold uppercase tracking-widest text-[#f97316] mb-4">{{ Auth::user()->role ?? 'Player' }}</p>
    
    <!-- Join Date -->
    <div class="text-[10px] text-gray-500 uppercase tracking-wider">
        Member since {{ Auth::user()->created_at->format('M Y') }}
    </div>
</div>
