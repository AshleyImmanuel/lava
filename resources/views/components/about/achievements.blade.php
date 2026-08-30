<section class="py-24 relative">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="text-lava-500 font-semibold uppercase tracking-widest text-sm">Our Track Record</span>
            <h2 class="section-title text-4xl md:text-5xl text-white mt-4">Achievements</h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
            @foreach([
                ['number' => '25+', 'label' => 'Tournament Wins'],
                ['number' => '₹4Cr+', 'label' => 'Prize Money'],
                ['number' => '100K+', 'label' => 'Social Followers'],
                ['number' => '50+', 'label' => 'Active Players'],
            ] as $stat)
            <div class="stat-card rounded-2xl p-8 text-center hover-lift">
                <div class="text-4xl md:text-5xl font-bold font-[Orbitron] gradient-text mb-3">{{ $stat['number'] }}</div>
                <p class="uppercase tracking-wider text-sm" style="color: #a3a3a3;">{{ $stat['label'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
