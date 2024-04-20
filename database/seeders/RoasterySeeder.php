<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoasterySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now('Asia/Jakarta');

        DB::table('roasteries')->insert([
            'user_id' => 2,
            'company_id' => 1,
            'name' => 'Johny',
            'address' => 'Jalan antah berantah, gang buntu',
            'phone_number' => '0812345678901',
            'description' => 'Saya adalah seorang roastery, hihihihi',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('roasteries')->insert([
            'user_id' => 4,
            'company_id' => 2,
            'name' => 'Johny 2',
            'address' => 'Jalan antah berantah, gang buntu',
            'phone_number' => '0812345678901',
            'description' => 'Saya adalah seorang roastery, hihihihi',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
