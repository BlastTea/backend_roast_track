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
        DB::table('members')->insert([
            'user_id' => 1,
            'company_id' => 1,
            'role' => 'owner',
        ]);
        DB::table('members')->insert([
            'user_id' => 2,
            'company_id' => 1,
            'role' => 'admin',
        ]);
        DB::table('members')->insert([
            'user_id' => 3,
            'company_id' => 1,
            'role' => 'roastery',
        ]);
    }
}
