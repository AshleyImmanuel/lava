<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Team;
use App\Models\Event;
use App\Models\Announcement;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Games
        $valorant = Game::create(['name' => 'VALORANT', 'type' => 'FPS', 'image_url' => null]);
        $cs2 = Game::create(['name' => 'Counter-Strike 2', 'type' => 'FPS', 'image_url' => null]);
        $freefire = Game::create(['name' => 'Free Fire', 'type' => 'Battle Royale', 'image_url' => null]);
        $lol = Game::create(['name' => 'League of Legends', 'type' => 'MOBA', 'image_url' => null]);
        $dota = Game::create(['name' => 'Dota 2', 'type' => 'MOBA', 'image_url' => null]);
        $fc = Game::create(['name' => 'EA FC 25', 'type' => 'Sports', 'image_url' => null]);

        // Teams
        $phoenix = Team::create(['name' => 'LAVA Phoenix', 'game_id' => $valorant->id, 'logo_url' => '/images/teams/phoenix-logo.svg']);
        \App\Models\User::factory(5)->create()->each(function ($user) use ($phoenix) {
            $phoenix->members()->create(['user_id' => $user->id, 'role' => 'main']);
        });

        $inferno = Team::create(['name' => 'LAVA Inferno', 'game_id' => $cs2->id, 'logo_url' => '/images/teams/inferno-logo.svg']);
        \App\Models\User::factory(5)->create()->each(function ($user) use ($inferno) {
            $inferno->members()->create(['user_id' => $user->id, 'role' => 'main']);
        });

        $blaze = Team::create(['name' => 'LAVA Blaze', 'game_id' => $freefire->id, 'logo_url' => '/images/teams/blaze-logo.svg']);
        \App\Models\User::factory(4)->create()->each(function ($user) use ($blaze) {
            $blaze->members()->create(['user_id' => $user->id, 'role' => 'main']);
        });

        // Events
        Event::create([
            'title' => 'VALORANT Regional Championship',
            'type' => 'tournament',
            'game_id' => $valorant->id,
            'start_time' => now()->addDays(7),
            'max_players' => 50,
            'description' => 'Join our regional championship and prove your skills!',
            'status' => 'upcoming',
        ]);

        Event::create([
            'title' => 'CS2 Weekly Scrim',
            'type' => 'scrim',
            'game_id' => $cs2->id,
            'start_time' => now()->addDays(2),
            'max_players' => 10,
            'description' => 'Practice scrim for team members.',
            'status' => 'upcoming',
        ]);

        Event::create([
            'title' => 'Free Fire Tryouts - January',
            'type' => 'tryout',
            'game_id' => $freefire->id,
            'start_time' => now()->addDays(5),
            'max_players' => 100,
            'description' => 'Open tryouts for new Free Fire players.',
            'status' => 'upcoming',
        ]);

        // Announcements
        Announcement::create([
            'title' => 'Welcome to LAVA ESPORTS',
            'content' => 'We are excited to launch our new esports platform. Stay tuned for upcoming events and tournaments!',
            'published_at' => now(),
        ]);

        Announcement::create([
            'title' => 'New Partnership Announcement',
            'content' => 'LAVA ESPORTS has partnered with a leading gaming brand. More details coming soon!',
            'published_at' => now(),
        ]);
    }
}
