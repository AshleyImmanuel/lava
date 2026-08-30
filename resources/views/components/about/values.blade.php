<section class="py-24 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-lava-500 font-semibold uppercase tracking-widest text-sm">What Drives Us</span>
            <h2 class="section-title text-4xl md:text-5xl text-white mt-4">Our Core Values</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach([
                ['icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Excellence', 'desc' => 'Striving for the best in everything we do, from gameplay to content.'],
                ['icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z', 'title' => 'Teamwork', 'desc' => 'United we stand, together we dominate every battlefield.'],
                ['icon' => 'M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z', 'title' => 'Passion', 'desc' => 'Gaming is not just what we do; it\'s who we are.'],
                ['icon' => 'M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z', 'title' => 'Integrity', 'desc' => 'Fair play and sportsmanship in every competition.'],
            ] as $value)
            <div class="glass-card rounded-2xl p-8 text-center hover-lift">
                <div class="w-16 h-16 mx-auto rounded-xl flex items-center justify-center mb-6" style="background: linear-gradient(135deg, rgba(244, 67, 54, 0.2), rgba(255, 152, 0, 0.2));">
                    <svg class="w-8 h-8" style="color: #f87171;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $value['icon'] }}"/>
                    </svg>
                </div>
                <h3 class="text-xl font-bold font-[Orbitron] mb-3" style="color: #ffffff;">{{ $value['title'] }}</h3>
                <p style="color: #a3a3a3;">{{ $value['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
