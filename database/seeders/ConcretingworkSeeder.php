<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConcretingworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $concreting_works = [
            // 1:2:4 Hand
            [
                'ratio_type_id' => 4,
                'mixed_type_id' => 1, // Hand
                'cements' => 18.48,
                'aggregates' => 0.92,
                'sands' => 0.46,
                'masons' => 1,
                'workers' => 10,
            ],

            // 1:2:4 Machine
            [
                'ratio_type_id' => 4,
                'mixed_type_id' => 2, // Machine
                'cements' => 18.48,
                'aggregates' => 0.92,
                'sands' => 0.46,
                'fuel' => 2,
                'masons' => 1,
                'workers' => 8,
                'machine_drivers' => 0.5,
            ],

            // 1:3:6 Hand
            [
                'ratio_type_id' => 5, // 1:3:6
                'mixed_type_id' => 1, // Hand
                'cements' => 12.86,
                'aggregates' => 0.96,
                'sands' => 0.48,
                'masons' => 1,
                'workers' => 8,
            ],

            // 1:3:6 Machine
            [
                'ratio_type_id' => 5, // 1:3:6
                'mixed_type_id' => 2, // Machine
                'cements' => 18.42,
                'aggregates' => 0.92,
                'sands' => 0.46,
                'fuel' => 2,
                'masons' => 1,
                'workers' => 6,
                'machine_drivers' => 0.5,
            ]
        ];
        foreach($concreting_works as $concreting_work){
            DB::table('concretingworks')->insert($concreting_work);
        }
    }
}
