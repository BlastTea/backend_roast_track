<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now('Asia/Jakarta');

        DB::table('orders')->insert([
            'admin_id' => 1,
            'company_id' => 1,
            'orderers_name' => 'Zalorin Vexstar',
            'address' => 'Jalan antah berantah, gang buntu',
            'bean_type' => 'dark',
            'from_district' => 'Desa sidomulyo',
            'amount' => 1,
            'total' => 100000,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        
        // Second order
        DB::table('orders')->insert([
            'admin_id' => 3,
            'company_id' => 2,
            'orderers_name' => 'Zalorin Vexstar',
            'address' => 'Jalan antah berantah, gang buntu',
            'bean_type' => 'dark',
            'from_district' => 'Desa sidomulyo',
            'amount' => 2,
            'total' => 200000,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
