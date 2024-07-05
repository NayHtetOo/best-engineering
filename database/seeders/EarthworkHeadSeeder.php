<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EarthworkHeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('earthwork_heads')->insert([
            'site_id' => 1,
            'land_type_id' => 1,
            'cost_type_id' => 1,
            'description' => '၄ပေပတ်လည်မြေကြီးတူးလုပ်ငန်း',
            'length' => 10.0,
            'width' => 10.0,
            'height' => 10.0,
            'qty' => 1,
            'workers' => 15.0,
            'salary_rate' => 10000.0,
            'amount' => 150000.0
       ]);
    }
}
