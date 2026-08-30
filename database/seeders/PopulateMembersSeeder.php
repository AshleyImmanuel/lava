<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Team;
use App\Models\User;

class PopulateMembersSeeder extends Seeder
{
    public function run(): void
    {
        $teams = Team::withCount('members')->get();
        
        foreach ($teams as $team) {
            if ($team->members_count == 0) {
                User::factory(5)->create()->each(function ($user) use ($team) {
                    $team->members()->create([
                        'user_id' => $user->id,
                        'role' => 'main'
                    ]);
                });
                $this->command->info("Populated users for team: {$team->name}");
            } else {
                $this->command->info("Skipping team {$team->name}, already has {$team->members_count} members.");
            }
        }
    }
}
