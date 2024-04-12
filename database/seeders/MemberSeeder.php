<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();

        DB::table('members')->insert([
            'user_id' => 1,
            'company_id' => 1,
            'role' => 'owner',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('members')->insert([
            'user_id' => 2,
            'company_id' => 1,
            'role' => 'admin',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('members')->insert([
            'user_id' => 3,
            'company_id' => 1,
            'role' => 'roastery',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
