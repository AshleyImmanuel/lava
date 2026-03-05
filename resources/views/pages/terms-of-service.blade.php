@extends('layouts.app')

@section('title', 'Terms of Service - LAVA ESPORTS')

@section('content')
<div class="pt-24 pb-12 bg-black min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 bg-[#0a0a0a] border border-[#1a1a1a] rounded-xl shadow-2xl">
        <h1 class="text-4xl font-black text-white font-[Orbitron] uppercase tracking-widest mb-2">Terms of Service</h1>
        <div class="h-1 w-24 bg-red-600 mb-8"></div>
        
        <div class="prose prose-invert prose-red max-w-none text-gray-300 space-y-6">
            <p>Last updated: {{ date('F j, Y') }}</p>
            
            <h2 class="text-2xl font-bold text-white mt-8 mb-4">1. Acceptance of Terms</h2>
            <p>By accessing and utilizing the LAVA ESPORTS platform, you accept and agree to be bound by the terms and provision of this agreement. Furthermore, when using our services, you shall be subject to any posted guidelines or rules applicable to such services.</p>

            <h2 class="text-2xl font-bold text-white mt-8 mb-4">2. Access and Account</h2>
            <p>To access certain features of the platform (like applying to teams or registering for events), you may be required to register for an account. You agree to provide accurate, current, and complete information and keep it updated. You are responsible for safeguarding your password.</p>

            <h2 class="text-2xl font-bold text-white mt-8 mb-4">3. Conduct and Behavior</h2>
            <p>LAVA ESPORTS maintains a strict code of conduct. Harassment, cheating, toxic behavior, or attempting to exploit vulnerabilities in our platform or connected game titles will result in immediate termination of your account and permanent ban from our organization.</p>

            <h2 class="text-2xl font-bold text-white mt-8 mb-4">4. Modifications to Terms</h2>
            <p>We reserve the right to modify these terms from time to time at our sole discretion. Therefore, you should review these pages periodically. Your continued use of the platform after any such change constitutes your acceptance of the new Terms.</p>
        </div>
    </div>
</div>
@endsection
