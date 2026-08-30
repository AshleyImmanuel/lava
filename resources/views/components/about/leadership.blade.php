<section class="py-24 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-ash-950 via-lava-950/10 to-ash-950"></div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-ember-500 font-semibold uppercase tracking-widest text-sm">The People Behind</span>
            <h2 class="section-title text-4xl md:text-5xl text-white mt-4">Leadership Team</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-4xl mx-auto">
            @foreach([
                ['name' => 'Aman Antony', 'nickname' => 'FELIX', 'role' => 'Founder & CEO', 'bio' => 'Former Pro Player Turned Visionary Leader.'],
                ['name' => 'Abhishek B', 'nickname' => 'FireStorm', 'role' => 'COO', 'bio' => 'Operations Expert With 10+ Years In Esports.'],
                ['name' => 'Abhiram K', 'nickname' => 'RedBeast', 'role' => 'Head Coach', 'bio' => 'Championship-Winning Strategist And Mentor.'],
            ] as $leader)
            <div class="glass-card rounded-2xl p-8 text-center hover-lift">
                <div class="w-24 h-24 mx-auto mb-6 rounded-full flex items-center justify-center" style="background: linear-gradient(135deg, #f44336, #fb8c00);">
                    <span class="text-3xl font-bold font-[Orbitron]" style="color: #ffffff;">{{ substr($leader['name'], 0, 1) }}</span>
                </div>
                <h3 class="text-xl font-bold mb-1" style="color: #ffffff;">{{ $leader['name'] }}</h3>
                <p class="text-sm mb-2" style="color: #a3a3a3;">Better known as <span class="font-bold" style="color: #f87171;">"{{ $leader['nickname'] }}"</span></p>
                <p class="font-medium mb-3" style="color: #f87171;">{{ $leader['role'] }}</p>
                <p class="text-sm" style="color: #a3a3a3;">{{ $leader['bio'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
