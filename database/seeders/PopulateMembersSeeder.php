<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PopulateMembersSeeder extends Seeder
{
    public function run(): void
    {
        $this->command?->info('PopulateMembersSeeder skipped: dummy member generation is disabled.');
    }
}
