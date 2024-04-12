<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();

        DB::table('users')->insert([
            'username' => 'owner',
            'password' => '$2y$10$PbKGhTF7EkfUOVt8yzegb.eEdnxEnFcAjmvyGhBFs8DVUwbMijm8y',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('users')->insert([
            'username' => 'admin',
            'password' => '$2y$10$Ey/BIoJr.V0XkH1fKoOwPeDwVfUzi/EjoKEOl.50Z4.Jrt9DQB/sK',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('users')->insert([
            'username' => 'roastery',
            'password' => '$2y$10$nb7oyN5vtQ4F9duGjUq4ueqZeH60BU0CQqrwLFSH/A/7gLzAy4cbm',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
