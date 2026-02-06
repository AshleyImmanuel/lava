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
        // Drop the old check constraint
        DB::statement("ALTER TABLE users DROP CONSTRAINT IF EXISTS users_role_check");
        
        // Add new check constraint
        DB::statement("ALTER TABLE users ADD CONSTRAINT users_role_check CHECK (role IN ('admin', 'player', 'visitor', 'recruiter'))");
        
        // Promote specific user to admin
        DB::table('users')->where('email', 'immauelashley77@gmail.com')->update(['role' => 'admin']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert to original check constraint
        DB::statement("ALTER TABLE users DROP CONSTRAINT IF EXISTS users_role_check");
        DB::statement("ALTER TABLE users ADD CONSTRAINT users_role_check CHECK (role IN ('admin', 'player', 'visitor'))");
    }
};
