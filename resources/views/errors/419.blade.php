@extends('layouts.app')

@section('title', '419 - Session Expired | LAVA ESPORTS')

@section('content')
<div class="relative min-h-screen flex items-center justify-center">
    <div class="absolute inset-0 overflow-hidden pointer-events-none" style="contain: strict;">
        <div class="absolute top-1/3 left-1/4 w-96 h-96 bg-orange-500/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-1/3 right-1/4 w-80 h-80 bg-red-500/5 rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 text-center px-4 max-w-2xl mx-auto">
        <!-- Large 419 -->
        <div class="mb-8">
            <h1 class="text-[10rem] md:text-[14rem] font-black text-transparent bg-clip-text bg-gradient-to-r from-orange-500 via-amber-500 to-orange-600 font-[Orbitron] leading-none tracking-tighter opacity-90">
                419
            </h1>
        </div>

        <!-- Message -->
        <h2 class="text-2xl md:text-3xl font-black text-white font-[Orbitron] uppercase tracking-widest mb-4">
            Session Expired
        </h2>
        <p class="text-gray-400 text-lg mb-10 leading-relaxed">
            Your session has timed out for security reasons. Please refresh the page and try again.
        </p>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <a href="javascript:location.reload()" class="px-8 py-4 rounded-xl font-bold text-lg text-white flex items-center space-x-2 transition-all duration-300 hover:scale-105 active:scale-95"
               style="background: linear-gradient(135deg, #f97316 0%, #ea580c 100%); box-shadow: 0 0 25px rgba(249, 115, 22, 0.4);">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                </svg>
                <span>Refresh Page</span>
            </a>
            <a href="{{ url('/') }}" class="px-8 py-4 rounded-xl font-bold text-lg flex items-center space-x-2 transition-all duration-300 hover:scale-105 active:scale-95 bg-white/5 border border-white/10 text-gray-300 hover:bg-white/10 hover:text-white">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                </svg>
                <span>Back to Home</span>
            </a>
        </div>
    </div>
</div>
@endsection
