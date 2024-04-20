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
        $now = now('Asia/Jakarta');

        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$Ey/BIoJr.V0XkH1fKoOwPeDwVfUzi/EjoKEOl.50Z4.Jrt9DQB/sK',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('users')->insert([
            'username' => 'roastery',
            'email' => 'roastery@gmail.com',
            'password' => '$2y$10$nb7oyN5vtQ4F9duGjUq4ueqZeH60BU0CQqrwLFSH/A/7gLzAy4cbm',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        /// Second users
        DB::table('users')->insert([
            'username' => 'admin2',
            'email' => 'admin2@gmail.com',
            'password' => '$2y$10$Ey/BIoJr.V0XkH1fKoOwPeDwVfUzi/EjoKEOl.50Z4.Jrt9DQB/sK',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('users')->insert([
            'username' => 'roastery2',
            'email' => 'roastery2@gmail.com',
            'password' => '$2y$10$nb7oyN5vtQ4F9duGjUq4ueqZeH60BU0CQqrwLFSH/A/7gLzAy4cbm',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
