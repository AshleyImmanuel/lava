<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title', config('app.name', 'LAVA ESPORTS'))</title>
        <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
        <style>[x-cloak] { display: none !important; }</style>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased lava-bg text-ash-200 selection:bg-lava-500 selection:text-white">
        
        <!-- Ambient Background (The "Lava" effect) - Optimized for performance -->
        <div class="fixed inset-0 pointer-events-none overflow-hidden" style="contain: strict; will-change: auto;">
            <div class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-red-600/20 rounded-full blur-[40px]"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[500px] h-[500px] bg-orange-600/20 rounded-full blur-[35px]"></div>
            <div class="absolute top-[20%] right-[20%] w-[350px] h-[350px] bg-lava-600/10 rounded-full blur-[30px]"></div>
        </div>
        
        <!-- Intro Animation (only on homepage) -->
        @if(request()->is('/') || request()->routeIs('home'))
            <x-intro-animation />
        @endif

        <!-- Global Animations (contains styles/scripts) -->
        <x-global-animations />

        <!-- ===== MAIN ===== -->
        <div class="main-wrap @if(!request()->is('/') && !request()->routeIs('home')) no-intro @endif" id="main">
            @include('components.navigation')
            <main>@yield('content')</main>
            @include('components.footer')
            
            <x-toast />
            <x-confirmation-modal />
        </div>

        @stack('scripts')
    </body>
</html>
