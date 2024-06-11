<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatioTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ratio_types = [
            [
                'ratio' => '1:2',
                'name' => 'Brickwork-ratio'
            ],
            [
                'ratio' => '1:3',
                'name' => 'Brickwork-ratio'
            ],
            [
                'ratio' => '1:4',
                'name' => 'Brickwork-ratio'
            ],
            [
                'ratio' => '1:2:4',
                'name' => 'Concreting-ratio'
            ],
            [
                'ratio' => '1:3:6',
                'name' => 'Concreting-ratio'
            ],
            [
                'ratio' => '1:3/2:3',
                'name' => 'Cement Concrete Work'
            ],
        ];
        foreach($ratio_types as $ratio_type){
            DB::table('ratio_types')->insert($ratio_type);
        }
    }
}
