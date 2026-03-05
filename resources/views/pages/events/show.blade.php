@extends('layouts.app')

@section('content')
<div class="relative min-h-screen pt-24 pb-12">
    <!-- Background Elements -->
    <div class="fixed inset-0 pointer-events-none">
        <div class="absolute top-0 left-0 w-full h-[500px] bg-gradient-to-b from-lava-900/20 to-transparent"></div>
        <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-lava-600/10 rounded-full blur-[100px]"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Back Button -->
        <a href="{{ route('events.index') }}" class="inline-flex items-center text-gray-400 hover:text-white mb-8 transition-colors">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Events
        </a>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Banner Image -->
                <x-events.hero :event="$event" />
                
                <!-- Description & Match Results -->
                <x-events.details :event="$event" />
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Registration & CTA -->
                <x-events.cta :event="$event" />
            </div>
        </div>
    </div>
</div>
@endsection
