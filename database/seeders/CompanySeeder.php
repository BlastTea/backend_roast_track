<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now('Asia/Jakarta');

        DB::table('companies')->insert([
            'admin_id' => 1,
            'name' => 'M Roasting',
            'address' => 'Jl. antah berantah',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
        DB::table('companies')->insert([
            'admin_id' => 2,
            'name' => 'M Roasting 2',
            'address' => 'Jl. antah berantah',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
