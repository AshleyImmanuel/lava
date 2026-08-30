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
        
        <x-games.hero :game="$game" :themeColor="$themeColor" />

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

                <x-games.roster-list :teams="$game->teams" :themeColor="$themeColor" />
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

                <x-games.event-list :events="$game->events" :themeColor="$themeColor" :themeColorDark="$themeColorDark" />
            </div>
        </div>
    </div>
</div>
@endsection
