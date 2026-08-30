@extends('layouts.app')

@section('title', 'Player Dashboard - LAVA ESPORTS')

@section('content')
<div class="relative min-h-screen pt-24 pb-12" x-data="{ tab: '{{ request('tab', 'overview') }}' }">
    <!-- Main Container -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Header (Mobile Only) -->
        <div class="lg:hidden mb-8 slide-up">
            <h1 class="text-4xl font-black text-white font-[Orbitron] tracking-tight">
                PLAYER <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-orange-500">DASHBOARD</span>
            </h1>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            
            <!-- Sidebar (Left Column) -->
            <div class="lg:col-span-1 slide-up" style="animation-delay: 0.1s;">
                <div class="sticky top-24">
                    @include('dashboard.partials.sidebar')
                </div>
            </div>

            <!-- Content Area (Right Column) -->
            <div class="lg:col-span-3 space-y-6 slide-up" style="animation-delay: 0.2s;">
                
                <!-- Header (Desktop Only) -->
                <div class="hidden lg:block mb-8">
                    <h1 class="text-5xl font-black text-white font-[Orbitron] tracking-tight mb-2">
                        @if(Auth::user()->isAdmin())
                        ADMIN <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-orange-500">PANEL</span>
                        @else
                        PLAYER <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-orange-500">DASHBOARD</span>
                        @endif
                    </h1>
                    <p class="text-gray-400 text-lg">Welcome back, {{ Auth::user()->name }}. Ready to dominate?</p>
                </div>

                <!-- Tab: Overview -->
                <div x-show="tab === 'overview'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                    @include('dashboard.partials.overview')
                </div>

                <!-- Tab: My Team -->
                <div x-show="tab === 'team'" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                    @include('dashboard.partials.team-tab')
                </div>

                <!-- Tab: History -->
                <div x-show="tab === 'history'" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                    @include('dashboard.partials.history')
                </div>

                <!-- Tab: Settings -->
                <div x-show="tab === 'settings'" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                    @include('dashboard.partials.settings')
                </div>

                <!-- Tab: Recruitment (Recruiters & Admins) -->
                @if(Auth::user()->isRecruiter() || Auth::user()->isAdmin())
                <div x-show="tab === 'recruitment'" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                    @include('dashboard.partials.recruitment')
                </div>
                @endif

                <!-- Admin Tabs -->
                @if(Auth::user()->isAdmin())
                <div x-show="tab === 'admin-users'" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                    @include('dashboard.partials.admin-users')
                </div>
                <div x-show="tab === 'admin-events'" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                    @include('dashboard.partials.admin-events')
                </div>
                <div x-show="tab === 'admin-teams'" x-cloak x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0">
                    @include('dashboard.partials.admin-teams')
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection
