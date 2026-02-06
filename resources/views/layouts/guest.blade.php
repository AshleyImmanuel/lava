<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'LAVA ESPORTS') }}</title>
        <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;700;900&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-black selection:bg-red-500 selection:text-white">
        <!-- Background Elements -->
        <div class="fixed inset-0 pointer-events-none overflow-hidden">
            <div class="absolute top-[-20%] left-[-10%] w-[600px] h-[600px] bg-red-600/20 rounded-full blur-[120px] animate-pulse"></div>
            <div class="absolute bottom-[-20%] right-[-10%] w-[600px] h-[600px] bg-orange-600/20 rounded-full blur-[120px] animate-pulse" style="animation-delay: 1s;"></div>
            <!-- Noise removed -->
        </div>

        <!-- Back Button -->
        <a href="/" class="absolute top-8 left-8 text-gray-400 hover:text-white transition-colors flex items-center gap-2 z-50 group">
            <svg class="w-5 h-5 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            <span class="font-[Orbitron] text-sm uppercase tracking-wider">Back to Home</span>
        </a>

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 relative z-10">
            <div>
                <a href="/">
                    <x-application-logo class="w-24 h-24 fill-current text-white hover:scale-110 transition-transform duration-300 drop-shadow-[0_0_25px_rgba(249,115,22,0.5)]" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden relative">
                {{ $slot }}
            </div>
        </div>
        <x-toast />
    </body>
</html>
