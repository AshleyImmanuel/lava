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
        Schema::table('events', function (Blueprint $table) {
            if (! Schema::hasColumn('events', 'entry_fee')) {
                $table->unsignedInteger('entry_fee')->default(0)->after('max_players');
            }

            if (! Schema::hasColumn('events', 'prize_pool')) {
                $table->unsignedInteger('prize_pool')->default(0)->after('entry_fee');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            if (Schema::hasColumn('events', 'prize_pool')) {
                $table->dropColumn('prize_pool');
            }

            if (Schema::hasColumn('events', 'entry_fee')) {
                $table->dropColumn('entry_fee');
            }
        });
    }
};
