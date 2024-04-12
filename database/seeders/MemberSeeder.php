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
        $now = now('Asia/Jakarta');

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

        //Second members
        DB::table('members')->insert([
            'user_id' => 4,
            'company_id' => 2,
            'role' => 'owner',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('members')->insert([
            'user_id' => 5,
            'company_id' => 2,
            'role' => 'admin',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('members')->insert([
            'user_id' => 6,
            'company_id' => 2,
            'role' => 'roastery',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
