<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $work_types = [
            [
                'name_mm' => 'မြေကြီးတူးလုပ်ငန်း',
                'name_eng' => 'Earth Work'
            ],
            [
                'name_mm' => 'အုတ်စီလုပ်ငန်း',
                'name_eng' => 'Brick Work'
            ],
            [
                'name_mm' => 'Concreting Work',
                'name_eng' => 'Concreting Work'
            ]
        ];
        foreach($work_types as $work_type){
            DB::table('work_types')->insert($work_type);
        }
    }
}
