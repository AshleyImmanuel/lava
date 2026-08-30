<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin', 'player', 'visitor'])->default('player');
            $table->string('gamer_tag')->unique()->nullable();
            $table->string('discord_id')->nullable();
            $table->text('bio')->nullable();
            $table->json('rank_info')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'gamer_tag', 'discord_id', 'bio', 'rank_info']);
        });
    }
};
