@extends('layouts.app')

@section('title', $team->name . ' - LAVA ESPORTS')

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
    $baseColor = $team->game->color ?? 'lava';
    $themeColor = $colors[$baseColor] ?? '#f44336';
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
        
        <!-- Grid Pattern -->
        <div class="absolute inset-0 bg-[linear-gradient(rgba(255,255,255,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.03)_1px,transparent_1px)] bg-[size:50px_50px] [mask-image:radial-gradient(ellipse_at_center,black_40%,transparent_100%)]"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Back Button -->
        <a href="{{ route('teams.index') }}" class="inline-flex items-center gap-2 px-4 py-2 mt-6 rounded-lg bg-white/5 border border-white/10 text-gray-400 hover:text-white hover:border-white/20 transition-all group">
            <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
            </svg>
            <span class="font-medium text-sm">Back to Teams</span>
        </a>

        <x-teams.hero :team="$team" :themeColor="$themeColor" />

        <!-- Team Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 mb-20">
             <!-- Left Column: Upcoming Events & Matches (8 cols) -->
             <div class="lg:col-span-8 space-y-12">
                <x-teams.upcoming-events :events="$upcomingEvents" :themeColor="$themeColor" />
                
                <x-teams.recent-matches 
                    :matches="$pastMatches" 
                    :themeColor="$themeColor" 
                    :index="$upcomingEvents->count() > 0 ? '02' : '01'" 
                />
             </div>

             <!-- Right Column: Stats or Ads (4 cols) -->
             <div class="lg:col-span-4">
             </div>
        </div>

        <x-teams.management :team="$team" :themeColor="$themeColor" />
        <x-teams.roster :team="$team" />
    </div>
</div>
@endsection
