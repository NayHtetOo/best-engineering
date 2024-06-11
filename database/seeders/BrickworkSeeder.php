<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrickworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brickworks = [
            // 4" th 1:3
            [
                'thickness_type_id' => 1, // 4" th
                'ratio_type_id' => 2, // 1:3
                'bricks' => 550,
                'cements' => 2.65,
                'sands' => 0.1,
                'xmet' => 115,
                'masons' => 2,
                'workers' => 3,
                'unit' => 100
            ],
            // 9" th 1:2
            [
                'thickness_type_id' => 2, // 9" th
                'ratio_type_id' => 1, // ratio 1:2
                'bricks' => 1350,
                'cements' => 9.24,
                'sands' => 0.23,
                // 'xmet' => '',
                'masons' => 4,
                'workers' => 6,
                'unit' => 100
            ],
            // 9" th 1:3
            [
                'thickness_type_id' => 2, // 9" th
                'ratio_type_id' => 2, // ratio 1:3
                'bricks' => 1350,
                'cements' => 6.96,
                'sands' => 0.26,
                // 'xmet' => '',
                'masons' => 4,
                'workers' => 6,
                'unit' => 100
            ],
            // 9" th 1:4
            [
                'thickness_type_id' => 2, // 9" th
                'ratio_type_id' => 3, // ratio 1:4
                'bricks' => 1350,
                'cements' => 5.63,
                'sands' => 0.28,
                // 'xmet' => '',
                'masons' => 4,
                'workers' => 6,
                'unit' => 100
            ]
        ];

        foreach($brickworks as $brickwork){
            DB::table('brickworks')->insert($brickwork);
        }
    }
}
