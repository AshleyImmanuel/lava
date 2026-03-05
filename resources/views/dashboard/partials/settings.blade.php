<div class="space-y-8 animate-fade-in-up">
    <!-- Header -->
    <div>
        <h2 class="text-3xl font-black text-white font-[Orbitron] mb-2">ACCOUNT SETTINGS</h2>
        <p class="text-gray-400">Manage your profile information and account security.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <!-- Profile Information -->
        <x-dashboard.settings.profile-info />

        <!-- Security & Danger Zone -->
        <x-dashboard.settings.security-section />
    </div>
</div>
