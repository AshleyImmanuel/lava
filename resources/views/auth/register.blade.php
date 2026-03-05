<x-guest-layout>
    <div class="text-center mb-8">
        <h1 class="text-3xl font-black text-white font-[Orbitron] mb-3">Join the Fire</h1>
        <p class="text-gray-400">Create your LAVA ESPORTS account</p>
    </div>

    <a href="{{ route('auth.google') }}" 
       class="flex items-center justify-center w-full px-8 py-5 space-x-4 transition-all rounded-2xl text-white text-lg font-bold uppercase tracking-widest hover:scale-[1.02] active:scale-[0.98] group"
       style="background: linear-gradient(135deg, #dc2626 0%, #ea580c 50%, #f97316 100%); box-shadow: 0 8px 30px rgba(234, 88, 12, 0.5);">
        <svg class="w-7 h-7 transition-transform group-hover:scale-110" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#fff"/>
            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#fff"/>
            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#fff"/>
            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#fff"/>
        </svg>
        <span>Sign up with Google</span>
    </a>

    <div class="mt-10 text-center">
        <p class="text-gray-500">
            Already have an account? 
            <a href="{{ route('login') }}" class="text-lava-400 hover:text-lava-300 transition-colors font-bold">Sign in</a>
        </p>
    </div>

    <div class="mt-6 text-center">
        <p class="text-gray-600 text-xs uppercase tracking-widest">
            By signing up, you agree to our Terms of Service
        </p>
    </div>
</x-guest-layout>
