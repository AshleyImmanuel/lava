@extends('layouts.app')

@section('title', '403 - Access Denied | LAVA ESPORTS')

@section('content')
<div class="relative min-h-screen flex items-center justify-center">
    <div class="absolute inset-0 overflow-hidden pointer-events-none" style="contain: strict;">
        <div class="absolute top-1/3 left-1/4 w-96 h-96 bg-red-500/5 rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 text-center px-4 max-w-2xl mx-auto">
        <h1 class="text-[10rem] md:text-[14rem] font-black text-transparent bg-clip-text bg-gradient-to-r from-red-600 via-red-500 to-orange-500 font-[Orbitron] leading-none tracking-tighter opacity-90">
            403
        </h1>
        <h2 class="text-2xl md:text-3xl font-black text-white font-[Orbitron] uppercase tracking-widest mb-4">
            Access Denied
        </h2>
        <p class="text-gray-400 text-lg mb-10 leading-relaxed">
            {{ $exception->getMessage() ?: "You don't have permission to access this area. Only authorized personnel beyond this point." }}
        </p>
        <a href="{{ url('/') }}" class="btn-lava px-8 py-4 rounded-xl font-bold text-lg text-white inline-flex items-center space-x-2 transition-transform hover:scale-105 active:scale-95">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            <span>Back to Home</span>
        </a>
    </div>
</div>
@endsection
