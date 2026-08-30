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
        Schema::table('team_applications', function (Blueprint $table) {
            $table->string('ingame_id')->nullable();
            $table->string('ingame_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('personal_email')->nullable();
            $table->string('ingame_level')->nullable();
            $table->text('experience')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('team_applications', function (Blueprint $table) {
            $table->dropColumn(['ingame_id', 'ingame_name', 'phone_number', 'personal_email', 'ingame_level', 'experience']);
        });
    }
};
