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
            'admin_id' => 2,
            'company_id' => 1,
            'name' => 'Order 1',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        
        // Second order
        DB::table('orders')->insert([
            'admin_id' => 5,
            'company_id' => 2,
            'name' => 'Order 1',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
