@extends('layouts.app')

@section('title', 'Player Dashboard - LAVA ESPORTS')

@section('content')
<div class="relative min-h-screen pt-24 pb-12">
    <!-- Background Elements (Removed to use Global Layout) -->

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Welcome Header -->
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6 slide-up">
            <div>
                <h1 class="text-4xl md:text-6xl font-black text-white font-[Orbitron] tracking-tight mb-2">
                    @if(Auth::user()->isAdmin())
                    ADMIN <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-orange-500">PANEL</span>
                    @else
                    PLAYER <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-orange-500">DASHBOARD</span>
                    @endif
                </h1>
                <p class="text-gray-400 text-lg">Welcome back, {{ Auth::user()->name }}. Ready to dominate?</p>
            </div>
            
            <div class="flex gap-4">
                @if(Auth::user()->isAdmin())
                <a href="{{ route('admin.users.index') }}" class="px-6 py-2 rounded-xl text-white transition-all text-sm font-bold uppercase tracking-wider flex items-center border-2" style="background-color: #dc2626; border-color: #f97316; box-shadow: 0 0 20px rgba(220, 38, 38, 0.5);">
                    Admin Panel
                </a>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <!-- Left Column: Profile & Stats -->
            <div class="space-y-8 lg:col-span-1">
                
                <!-- Profile Card -->
                <div class="bg-white/5 border border-white/10 rounded-3xl p-6 backdrop-blur-sm slide-up" style="animation-delay: 0.1s;">
                    <div class="flex items-center gap-6 mb-6">
                        <div class="w-20 h-20 rounded-2xl bg-gradient-to-br from-gray-800 to-black p-1">
                            <div class="w-full h-full rounded-xl bg-gray-900 flex items-center justify-center border border-white/10">
                                <span class="text-3xl font-bold text-white font-[Orbitron]">{{ substr(Auth::user()->name, 0, 1) }}</span>
                            </div>
                        </div>
                        <div>
                            <h2 class="text-xl font-bold text-white font-[Orbitron]">{{ Auth::user()->name }}</h2>
                            <p class="text-sm font-bold tracking-wider uppercase mb-1" style="color: #f97316;">{{ Auth::user()->role ?? 'PLAYER' }}</p>
                            <p class="text-gray-500 text-xs">{{ Auth::user()->email }}</p>
                        </div>
                    </div>
                    
                    <div class="space-y-3">
                        <a href="{{ route('profile.edit') }}" class="block w-full py-3 rounded-xl bg-white/5 hover:bg-white/10 text-center text-sm font-bold text-white uppercase tracking-widest transition-colors">
                            Edit Profile
                        </a>
                    </div>
                </div>

                <!-- System Clock -->
                <div class="bg-white/5 border border-white/10 rounded-3xl p-6 backdrop-blur-sm slide-up" style="animation-delay: 0.15s;">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-xs font-bold uppercase tracking-widest" style="color: #9ca3af;">SYSTEM TIME</h3>
                        <div class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></div>
                    </div>
                    <div class="text-center py-2">
                        <div id="dashboard-clock" class="text-4xl font-black text-white font-[Orbitron] tracking-widest leading-none">
                            00:00:00
                        </div>
                        <div id="dashboard-date" class="text-xs font-bold uppercase tracking-widest mt-2" style="color: #f97316;">
                            LOADING...
                        </div>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="bg-white/5 border border-white/10 rounded-3xl p-6 backdrop-blur-sm slide-up" style="animation-delay: 0.2s;">
                    <h3 class="text-xs font-bold uppercase tracking-widest mb-4" style="color: #9ca3af;">CAREER STATS</h3>
                    <div class="flex justify-between items-center text-center divide-x divide-white/10">
                        <div class="px-2 w-1/3">
                            <div class="text-2xl font-black text-white font-[Orbitron]">{{ $eventsCount }}</div>
                            <div class="text-[10px] uppercase tracking-wider mt-1" style="color: #9ca3af;">Events</div>
                        </div>
                        <div class="px-2 w-1/3">
                            <div class="text-2xl font-black font-[Orbitron]" style="color: #f97316;">{{ $eventsCount }}</div> <!-- Using Events Count as a proxy for "Matches" participated for now -->
                            <div class="text-[10px] uppercase tracking-wider mt-1" style="color: #9ca3af;">Participated</div>
                        </div>
                        <div class="px-2 w-1/3">
                            <div class="text-2xl font-black text-white font-[Orbitron]">{{ data_get(Auth::user()->rank_info, 'rank', '-') }}</div>
                            <div class="text-[10px] uppercase tracking-wider mt-1" style="color: #9ca3af;">Rank</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Status & Activity -->
            <div class="lg:col-span-2 space-y-8">
                
                <!-- Active Team Status -->
                @include('dashboard.partials.team-status')

                <!-- Upcoming Events -->
                @include('dashboard.partials.upcoming-events')
            </div>
        </div>
    </div>

    <script>
        function updateDashboardClock() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('en-US', { hour12: false });
            const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const dateString = now.toLocaleDateString('en-US', dateOptions);
            
            const clockElement = document.getElementById('dashboard-clock');
            const dateElement = document.getElementById('dashboard-date');
            
            if (clockElement) {
                clockElement.textContent = timeString;
            }
            if (dateElement) {
                dateElement.textContent = dateString;
            }
        }
        
        // Update immediately and then every second
        updateDashboardClock();
        setInterval(updateDashboardClock, 1000);
    </script>
</div>
@endsection
