<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LandTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $land_types = [
            [
                'name_mm' => 'ရိုးရိုးမြေ',
                'name_eng' => 'Ordinary Soil',
                'rate' => 1.5
            ],
            [
                'name_mm' => 'အလည်အလတ်တန်းစားမြေ',
                'name_eng' => 'Medium Soil',
                'rate' => 2
            ],
            [
                'name_mm' => 'ခက်ခဲသောမြေ',
                'name_eng' => 'Hard Soil',
                'rate' => 3
            ]
        ];
        foreach($land_types as $land_type){
            DB::table('land_types')->insert($land_type);
        }
    }
}
