@extends('layouts.app')

@section('title', 'Profile - LAVA ESPORTS')

@section('content')
<div class="relative min-h-screen pt-24 pb-12 bg-black">
    <!-- Background Elements -->
    <div class="fixed inset-0 pointer-events-none">
        <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-lava-600/5 rounded-full blur-[120px]"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">
        <!-- Header -->
        <div class="flex items-end justify-between border-b border-white/10 pb-6">
            <div>
                <h2 class="text-3xl font-black text-white font-[Orbitron] mb-2">
                    PROFILE <span class="text-lava-500">SETTINGS</span>
                </h2>
                <p class="text-gray-400">Manage your account information and security.</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Profile Info -->
            <div class="p-6 sm:p-8 bg-white/5 border border-white/10 rounded-3xl backdrop-blur-sm">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            @if(!is_null($user->password))
                <div class="p-6 sm:p-8 bg-white/5 border border-white/10 rounded-3xl backdrop-blur-sm">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
            @endif

            <!-- Delete Account -->
            <div class="lg:col-span-2 p-6 sm:p-8 bg-red-900/10 border border-red-500/20 rounded-3xl backdrop-blur-sm">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
