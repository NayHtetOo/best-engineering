<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MixedTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mixed_types = [
            [
                'name_mm' => 'လက်ဖျော်',
                'name_eng' => 'Hand'
            ],
            [
                'name_mm' => 'စက်ဖျော်',
                'name_eng' => 'Machine'
            ]
        ];
        foreach($mixed_types as $mixed_type){
            DB::table('mixed_types')->insert($mixed_type);
        }
    }
}
