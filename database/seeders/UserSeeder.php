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
        
        /// First users
        DB::table('users')->insert([
            'company_id' => 1,
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$Ey/BIoJr.V0XkH1fKoOwPeDwVfUzi/EjoKEOl.50Z4.Jrt9DQB/sK',
            'role' => 'admin',
            'name' => 'admin',
            'phone_number' => '0812345678901',
            'description' => 'user admin',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('users')->insert([
            'company_id' => 1,
            'username' => 'roastery',
            'email' => 'roastery@gmail.com',
            'password' => '$2y$10$nb7oyN5vtQ4F9duGjUq4ueqZeH60BU0CQqrwLFSH/A/7gLzAy4cbm',
            'role' => 'roastery',
            'name' => 'roastery',
            'address' => 'alamat roastery',
            'phone_number' => '0812345678901',
            'description' => 'user roastery',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        /// Second users
        DB::table('users')->insert([
            'company_id' => 2,
            'username' => 'admin2',
            'email' => 'admin2@gmail.com',
            'password' => '$2y$10$Ey/BIoJr.V0XkH1fKoOwPeDwVfUzi/EjoKEOl.50Z4.Jrt9DQB/sK',
            'role' => 'admin',
            'name' => 'admin',
            'phone_number' => '0812345678901',
            'description' => 'user admin 2',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('users')->insert([
            'company_id' => 2,
            'username' => 'roastery2',
            'email' => 'roastery2@gmail.com',
            'password' => '$2y$10$nb7oyN5vtQ4F9duGjUq4ueqZeH60BU0CQqrwLFSH/A/7gLzAy4cbm',
            'role' => 'roastery',
            'name' => 'roastery',
            'address' => 'alamat roastery',
            'phone_number' => '0812345678901',
            'description' => 'user roastery 2',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
