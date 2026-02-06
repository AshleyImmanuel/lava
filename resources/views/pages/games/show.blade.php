@extends('layouts.app')

@section('title', $game->name . ' - LAVA ESPORTS')

@php
    $colors = [
        'lava' => '#f44336',
        'ember' => '#ff9800',
        'red' => '#ef4444',
        'orange' => '#f97316',
        'green' => '#22c55e',
        'blue' => '#3b82f6',
        'purple' => '#a855f7',
        'pink' => '#ec4899',
        'cyan' => '#06b6d4',
    ];
    $baseColor = $game->color ?? 'lava';
    $themeColor = $colors[$baseColor] ?? '#f44336';
    // Helper for darker shade (approximate)
    $themeColorDark = '#' . dechex(max(0, hexdec(substr($themeColor, 1)) - 0x222222)); 
@endphp

@section('content')
<div class="relative min-h-screen pt-24 pb-24 overflow-hidden selection:text-white" style="--theme: {{ $themeColor }}; selection-background-color: {{ $themeColor }}40;">
    <!-- CSS3 Mesh Background -->
    <div class="fixed inset-0 pointer-events-none z-0">
        <div class="absolute inset-0 bg-[#050505]"></div>
        
        <!-- Animated Gradients -->
        <div class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] rounded-full blur-[120px] animate-pulse-slow opacity-20" style="background-color: {{ $themeColor }}"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] bg-purple-900/20 rounded-full blur-[120px] animate-pulse-slow options-delay-1000"></div>
        
        <!-- Grid Pattern (CSS3) -->
        <div class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.03)_1px,transparent_1px)] bg-[size:50px_50px] [mask-image:radial-gradient(ellipse_at_center,black_40%,transparent_100%)]"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
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

        <!-- Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            <!-- Left Column: Rosters (8 cols) -->
            <div class="lg:col-span-8 space-y-12">
                <div class="flex items-center gap-4 mb-8">
                    <span class="text-5xl font-black text-white/10 font-[Orbitron]">01</span>
                    <div>
                        <h2 class="text-3xl font-bold text-white font-[Orbitron]">Active Rosters</h2>
                        <div class="h-0.5 w-12 mt-2" style="background-color: {{ $themeColor }}"></div>
                    </div>
                </div>

                @if($game->teams->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @foreach($game->teams as $team)
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
            </div>

            <!-- Right Column: Events (4 cols) -->
            <div class="lg:col-span-4 space-y-12">
                <div class="flex items-center gap-4 mb-8">
                    <span class="text-5xl font-black text-white/10 font-[Orbitron]">02</span>
                    <div>
                        <h2 class="text-3xl font-bold text-white font-[Orbitron]">Events</h2>
                        <div class="h-0.5 w-12 bg-white/50 mt-2"></div>
                    </div>
                </div>

                @if($game->events && $game->events->count() > 0)
                    <div class="space-y-4">
                        @foreach($game->events as $event)
                            <div onclick="toggleEvent('{{ $event->id }}')" class="group relative cursor-pointer">
                                <!-- Card Background -->
                                <div class="bg-zinc-900/50 backdrop-blur border border-white/10 rounded-xl overflow-hidden transition-all duration-300"
                                     onmouseover="this.style.borderColor='{{ $themeColor }}80'" 
                                     onmouseout="this.style.borderColor='rgba(255,255,255,0.1)'">
                                    
                                    <!-- Date Badge (Absolute) -->
                                    <div class="absolute top-0 right-0 p-4">
                                        <div class="flex flex-col items-center bg-black/50 border border-white/10 rounded px-2 py-1">
                                            <span class="text-xs font-bold text-gray-400">{{ $event->start_time->format('M') }}</span>
                                            <span class="text-xl font-bold text-white">{{ $event->start_time->format('d') }}</span>
                                        </div>
                                    </div>

                                    <div class="p-6 pr-16">
                                        <div class="text-xs font-bold uppercase tracking-widest mb-1" style="color: {{ $themeColor }}">{{ $event->status ?? 'Upcoming' }}</div>
                                        <h3 class="text-xl font-bold text-white font-[Orbitron] leading-tight mb-4">{{ $event->name }}</h3>
                                        
                                        <!-- Arrow Indicator -->
                                        <div class="flex items-center gap-2 text-xs text-gray-500 group-hover:text-white transition-colors">
                                            <span>View Details</span>
                                            <svg id="arrow-{{ $event->id }}" class="w-3 h-3 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                        </div>
                                    </div>

                                    <!-- Hidden Details Panel -->
                                    <div id="details-{{ $event->id }}" class="hidden border-t border-white/5 bg-black/20 p-6 space-y-4">
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <div class="text-[10px] text-gray-500 uppercase font-bold">Prize Pool</div>
                                                <div class="text-sm font-bold text-emerald-400">{{ str_replace('$', '₹', $event->prize_pool ?? 'TBA') }}</div>
                                            </div>
                                            <div>
                                                <div class="text-[10px] text-gray-500 uppercase font-bold">Time</div>
                                                <div class="text-sm font-bold text-white">{{ $event->start_time->format('H:i A') }}</div>
                                            </div>
                                        </div>
                                        @if($event->description)
                                            <div class="pt-2 border-t border-white/5">
                                                <p class="text-xs text-gray-400 leading-relaxed">{{ Str::limit($event->description, 100) }}</p>
                                            </div>
                                        @endif
                                        <a href="{{ route('events.show', $event) }}" 
                                           class="block w-full py-2 rounded text-center text-xs font-bold text-white uppercase tracking-widest transition-colors"
                                           style="background-color: {{ $themeColor }}"
                                           onmouseover="this.style.backgroundColor='{{ $themeColorDark }}'"
                                           onmouseout="this.style.backgroundColor='{{ $themeColor }}'">
                                            Register
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <script>
                        function toggleEvent(id) {
                            const details = document.getElementById('details-' + id);
                            const arrow = document.getElementById('arrow-' + id);
                            details.classList.toggle('hidden');
                            arrow.classList.toggle('rotate-180');
                        }
                    </script>
                @else
                    <div class="p-8 rounded-xl bg-white/5 border border-white/5 border-dashed text-center">
                        <p class="text-gray-500 text-sm font-[Orbitron]">NO_UPCOMING_EVENTS</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
