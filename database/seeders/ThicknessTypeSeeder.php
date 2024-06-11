<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ThicknessTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $thickness_types = [
            [
                'name_mm' => '၄ လက်မ အထူ အုတ်စီလုပ်ငန်း',
                'name_eng' => 'Around 4 Inches Thickness'
            ],
            [
                'name_mm' => '၉ လက်မ အထူ အုတ်စီလုပ်ငန်း',
                'name_eng' => 'Around 9 Inches Thickness'
            ]
        ];
        foreach($thickness_types as $thickness_type){
            DB::table('thickness_types')->insert($thickness_type);
        }
    }
}
