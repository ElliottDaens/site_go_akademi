<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    public function up(): void
    {
        if (DB::table('admins')->count() > 0) {
            return;
        }

        DB::table('admins')->insert([
            'username' => 'admin',
            'password' => Hash::make('Ellizeus667$'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void
    {
        DB::table('admins')->where('username', 'admin')->delete();
    }
};
