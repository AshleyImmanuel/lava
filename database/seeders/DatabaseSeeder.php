<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Keep only baseline game catalog; avoid seeding demo teams/events/users/announcements.
        Game::upsert([
            ['name' => 'VALORANT', 'type' => 'FPS', 'image_url' => null],
            ['name' => 'Counter-Strike 2', 'type' => 'FPS', 'image_url' => null],
            ['name' => 'Free Fire', 'type' => 'Battle Royale', 'image_url' => null],
            ['name' => 'League of Legends', 'type' => 'MOBA', 'image_url' => null],
            ['name' => 'Dota 2', 'type' => 'MOBA', 'image_url' => null],
            ['name' => 'EA FC 25', 'type' => 'Sports', 'image_url' => null],
        ], ['name'], ['type', 'image_url']);
    }
}
