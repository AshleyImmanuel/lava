@props(['game', 'themeColor'])

<!-- Modern Hero Section -->
<div class="flex flex-col items-center justify-center min-h-[50vh] pt-12 mb-20">
    <!-- Glitch Composition -->
    <div class="relative mb-6 group">
        <div class="absolute -inset-1 rounded-lg blur opacity-40 group-hover:opacity-100 transition duration-1000 group-hover:duration-200" style="background: linear-gradient(90deg, {{ $themeColor }}, 9a3412, {{ $themeColor }});"></div>
        <div class="relative px-6 py-2 bg-black rounded-lg border border-white/10 flex items-center gap-3">
            <span class="w-2 h-2 rounded-full animate-ping" style="background-color: {{ $themeColor }}"></span>
            <span class="font-[Orbitron] tracking-[0.2em] text-xs font-bold" style="color: {{ $themeColor }}">{{ $game->genre ?? 'COMPETITIVE DIVISION' }}</span>
        </div>
    </div>

    <h1 class="text-6xl md:text-8xl lg:text-9xl font-black text-transparent bg-clip-text bg-gradient-to-b from-white via-white to-white/40 font-[Orbitron] uppercase tracking-tighter text-center mb-8 drop-shadow-[0_0_35px_rgba(255,255,255,0.1)]">
        {{ $game->name }}
    </h1>

    <div class="max-w-2xl text-center relative">
        <div class="absolute -inset-x-12 top-0 h-px" style="background: linear-gradient(90deg, transparent, {{ $themeColor }}80, transparent);"></div>
        <p class="pt-8 text-lg md:text-xl text-gray-400 font-light leading-relaxed">
            {{ $game->description ?? 'Elite competition in ' . $game->name }}. <span class="text-white font-medium">Dominating the server</span>, one match at a time.
        </p>
        <div class="absolute -inset-x-12 bottom-0 h-px bg-gradient-to-r from-transparent via-white/10 to-transparent"></div>
    </div>
</div>
