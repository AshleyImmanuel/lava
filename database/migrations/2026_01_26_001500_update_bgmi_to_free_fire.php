<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update Game Name
        DB::table('games')
            ->where('name', 'BGMI')
            ->update(['name' => 'Free Fire']);

        // Update Events
        $events = DB::table('events')->where('title', 'LIKE', '%BGMI%')->orWhere('description', 'LIKE', '%BGMI%')->get();
        foreach ($events as $event) {
            DB::table('events')
                ->where('id', $event->id)
                ->update([
                    'title' => str_replace('BGMI', 'Free Fire', $event->title),
                    'description' => str_replace('BGMI', 'Free Fire', $event->description),
                ]);
        }

        // Update Teams (e.g. LAVA Blaze might be associated, or have BGMI in name)
        // Usually LAVA Blaze is the team for BGMI/Free Fire. 
        // We can just check for BGMI in team names just in case.
        $teams = DB::table('teams')->where('name', 'LIKE', '%BGMI%')->get();
        foreach ($teams as $team) {
             DB::table('teams')
                ->where('id', $team->id)
                ->update([
                    'name' => str_replace('BGMI', 'Free Fire', $team->name),
                ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert Game Name
        DB::table('games')
            ->where('name', 'Free Fire')
            ->update(['name' => 'BGMI']);

        // Revert Events
        $events = DB::table('events')->where('title', 'LIKE', '%Free Fire%')->orWhere('description', 'LIKE', '%Free Fire%')->get();
        foreach ($events as $event) {
            DB::table('events')
                ->where('id', $event->id)
                ->update([
                    'title' => str_replace('Free Fire', 'BGMI', $event->title),
                    'description' => str_replace('Free Fire', 'BGMI', $event->description),
                ]);
        }
    }
};
