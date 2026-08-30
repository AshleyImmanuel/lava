@extends('layouts.app')

@section('title', '404 - Page Not Found | LAVA ESPORTS')

@section('content')
<div class="relative min-h-screen flex items-center justify-center">
    <!-- Background Effects -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none" style="contain: strict;">
        <div class="absolute top-1/3 left-1/4 w-96 h-96 bg-red-500/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/3 right-1/4 w-80 h-80 bg-orange-500/5 rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 text-center px-4 max-w-2xl mx-auto">
        <!-- Glitch 404 -->
        <div class="mb-8">
            <h1 class="text-[10rem] md:text-[14rem] font-black text-transparent bg-clip-text bg-gradient-to-r from-red-500 via-orange-500 to-red-600 font-[Orbitron] leading-none tracking-tighter opacity-90" style="text-shadow: 0 0 80px rgba(239, 68, 68, 0.3);">
                404
            </h1>
        </div>

        <!-- Message -->
        <h2 class="text-2xl md:text-3xl font-black text-white font-[Orbitron] uppercase tracking-widest mb-4">
            Page Not Found
        </h2>
        <p class="text-gray-400 text-lg mb-10 leading-relaxed">
            This page has been consumed by the flames. The content you're looking for doesn't exist or has been moved.
        </p>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="{{ url('/') }}" class="btn-lava px-8 py-4 rounded-xl font-bold text-lg text-white flex items-center space-x-2 transition-transform hover:scale-105 active:scale-95">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <span>Back to Home</span>
            </a>
            <a href="{{ route('events.index') }}" class="btn-outline px-8 py-4 rounded-xl font-bold text-lg flex items-center space-x-2 transition-transform hover:scale-105 active:scale-95">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                </svg>
                <span>View Events</span>
            </a>
        </div>
    </div>
</div>
@endsection
