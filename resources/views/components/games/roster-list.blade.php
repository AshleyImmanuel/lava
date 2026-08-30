@props(['teams', 'themeColor'])

@if($teams->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($teams as $team)
            <div class="group relative h-full transition-all duration-500 ease-out hover:-translate-y-2 hover:scale-[1.02]">
                <!-- Hover Glow -->
                <div class="absolute -inset-1 rounded-2xl blur-md opacity-0 group-hover:opacity-100 transition-all duration-500" style="background: linear-gradient(135deg, {{ $themeColor }}, #4c1d95);"></div>
                
                <div class="relative h-full bg-zinc-900/90 backdrop-blur-xl border border-white/10 p-8 rounded-2xl overflow-hidden flex flex-col items-center text-center transition-all duration-500 group-hover:bg-black/90 group-hover:border-white/20 group-hover:shadow-2xl" style="box-shadow: 0 0 0 rgba(0,0,0,0);">
                    <!-- Decorative top line with animation -->
                    <div class="absolute top-0 left-0 w-full h-1 transition-all duration-500" style="background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);">
                        <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500" style="background: linear-gradient(90deg, transparent, {{ $themeColor }}, transparent);"></div>
                    </div>
                    
                    <!-- Corner accents on hover -->
                    <div class="absolute top-2 right-2 w-8 h-8 border-t-2 border-r-2 rounded-tr-lg opacity-0 group-hover:opacity-50 transition-all duration-500 transform translate-x-2 -translate-y-2 group-hover:translate-x-0 group-hover:translate-y-0" style="border-color: {{ $themeColor }};"></div>
                    <div class="absolute bottom-2 left-2 w-8 h-8 border-b-2 border-l-2 rounded-bl-lg opacity-0 group-hover:opacity-50 transition-all duration-500 transform -translate-x-2 translate-y-2 group-hover:translate-x-0 group-hover:translate-y-0" style="border-color: {{ $themeColor }};"></div>
                    
                    <!-- Avatar/Logo with enhanced hover -->
                    <div class="relative w-20 h-20 mb-6 transition-transform duration-500 group-hover:scale-110">
                        <div class="absolute inset-0 rounded-full blur-xl opacity-50 group-hover:blur-2xl group-hover:opacity-100 transition-all duration-500" style="background-color: {{ $themeColor }};"></div>
                        <div class="relative w-full h-full bg-gradient-to-br from-zinc-800 to-black rounded-full border-2 border-white/10 flex items-center justify-center transition-all duration-500 group-hover:border-opacity-80 overflow-hidden" style="--hover-border: {{ $themeColor }};">
                            @if($team->logo_url)
                                <img src="{{ $team->logo_url }}" alt="{{ $team->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            @else
                                <!-- Placeholder Esports Shield Logo -->
                                <svg class="w-10 h-10 transition-transform duration-500 group-hover:scale-110" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <!-- Shield base -->
                                    <path d="M32 4L8 14V30C8 46 32 60 32 60C32 60 56 46 56 30V14L32 4Z" fill="url(#shield-gradient-{{ $loop->index }})" stroke="{{ $themeColor }}" stroke-width="2"/>
                                    <!-- Inner design -->
                                    <path d="M32 12L16 19V31C16 42 32 52 32 52C32 52 48 42 48 31V19L32 12Z" fill="rgba(0,0,0,0.5)"/>
                                    <!-- Center emblem -->
                                    <path d="M32 20L26 28H32V38L38 30H32V20Z" fill="{{ $themeColor }}"/>
                                    <defs>
                                        <linearGradient id="shield-gradient-{{ $loop->index }}" x1="32" y1="4" x2="32" y2="60" gradientUnits="userSpaceOnUse">
                                            <stop offset="0%" stop-color="{{ $themeColor }}" stop-opacity="0.3"/>
                                            <stop offset="100%" stop-color="{{ $themeColor }}" stop-opacity="0.1"/>
                                        </linearGradient>
                                    </defs>
                                </svg>
                            @endif
                        </div>
                    </div>

                    <!-- Title with glow on hover -->
                    <h3 class="text-2xl font-black text-white font-[Orbitron] mb-2 uppercase transition-all duration-500 group-hover:tracking-wider" style="text-shadow: none;">
                        <span class="group-hover:drop-shadow-[0_0_15px_{{ $themeColor }}] transition-all duration-500">{{ $team->name }}</span>
                    </h3>
                    
                    <!-- Badge -->
                    <span class="inline-block px-3 py-1 text-xs font-bold uppercase tracking-wider rounded-full transition-all duration-500 opacity-60 group-hover:opacity-100" style="background: {{ $themeColor }}20; color: {{ $themeColor }};">ESPORTS</span>
                    
                    <div class="mt-auto pt-6 w-full space-y-4">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-400 transition-colors duration-300 group-hover:text-gray-300">{{ $team->region ?? 'Global' }}</span>
                            <div class="flex items-center gap-1 transition-colors duration-300" style="color: {{ $themeColor }};">
                                <span class="font-bold">{{ $team->members_count ?? 0 }}</span>
                                <span class="text-gray-500 text-xs uppercase">Players</span>
                            </div>
                        </div>
                        
                        <a href="{{ route('teams.show', $team) }}" 
                           class="block w-full py-3 border rounded-lg text-xs font-bold uppercase tracking-widest transition-all duration-300 text-center overflow-hidden relative"
                           style="background: rgba(255,255,255,0.05); border-color: {{ $themeColor }}40; color: #ffffff;">
                            <span class="relative z-10">View Roster</span>
                            <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-300" style="background: linear-gradient(90deg, transparent, {{ $themeColor }}20, transparent);"></div>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="p-12 rounded-2xl bg-white/5 border border-white/5 border-dashed text-center">
        <p class="text-gray-500 font-[Orbitron]">ROSTER_NOT_FOUND</p>
    </div>
@endif
