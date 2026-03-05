@extends('layouts.app')

@section('title', 'Privacy Policy - LAVA ESPORTS')

@section('content')
<div class="pt-24 pb-12 bg-black min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-[#0a0a0a] border border-[#1a1a1a] rounded-xl shadow-2xl">
        <h1 class="text-4xl font-black text-white font-[Orbitron] uppercase tracking-widest mb-2">Privacy Policy</h1>
        <div class="h-1 w-24 bg-red-600 mb-8"></div>
        
        <div class="prose prose-invert prose-red max-w-none text-gray-300 space-y-6">
            <p>Last updated: {{ date('F j, Y') }}</p>
            
            <h2 class="text-2xl font-bold text-white mt-8 mb-4">1. Information We Collect</h2>
            <p>We collect information that you provide directly to us, such as when you create an account, update your profile, apply for a team, register for an event, or communicate with us. This info may include your name, email, gaming ID, and region.</p>

            <h2 class="text-2xl font-bold text-white mt-8 mb-4">2. How We Use Your Information</h2>
            <p>We use the information we collect to operate, maintain, and improve our services, manage our esports teams and events, communicate with you, and personalize your experience on the LAVA ESPORTS platform.</p>

            <h2 class="text-2xl font-bold text-white mt-8 mb-4">3. Data Security</h2>
            <p>We take reasonable measures to help protect information about you from loss, theft, misuse and unauthorized access, disclosure, alteration and destruction.</p>

            <h2 class="text-2xl font-bold text-white mt-8 mb-4">4. Contact Us</h2>
            <p>If you have any questions about this Privacy Policy, please contact us at <a href="{{ route('contact') }}" class="text-red-500 hover:text-red-400">our contact page</a>.</p>
        </div>
    </div>
</div>
@endsection
