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
        Schema::table('event_registrations', function (Blueprint $table) {
            $table->string('ingame_id')->nullable()->after('status');
            $table->string('ingame_name')->nullable()->after('ingame_id');
            $table->string('ingame_level')->nullable()->after('ingame_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('event_registrations', function (Blueprint $table) {
            $table->dropColumn(['ingame_id', 'ingame_name', 'ingame_level']);
        });
    }
};
