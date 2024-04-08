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
        DB::table('users')->insert([
            'username' => 'admin',
            'password' => '$2y$10$Ey/BIoJr.V0XkH1fKoOwPeDwVfUzi/EjoKEOl.50Z4.Jrt9DQB/sK',
            'role' => 'admin',
        ]);
    }
}
