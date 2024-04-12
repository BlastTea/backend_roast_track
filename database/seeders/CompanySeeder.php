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
        $now = now();

        DB::table('companies')->insert([
            'name' => 'M Roasting',
            'address' => 'Jl. antah berantah',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
