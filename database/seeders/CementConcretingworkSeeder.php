<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CementConcretingworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cement_concreteworks = [
            // 1:3/2:3 cement concrete work
            [
                'site_id' => 1,
                'ratio_type_id' => 6,
                'mixed_type_id' => 1, // hand type
                'length' => 10,
                'width' => 10,
                'height' => 1,
                'qty' => 1,
                'cements' => 24.91,
                'aggregates' => 0.92,
                'sands' => 0.46,
                'masons' => 1,
                'workers' => 10
                // 'fuel' => ,
                // 'machine_drivers' => ,
            ],
            [
                'site_id' => 1,
                'ratio_type_id' => 6,
                'mixed_type_id' => 2, // machine type
                'length' => 10,
                'width' => 10,
                'height' => 1,
                'qty' => 1,
                'cements' => 24.91,
                'aggregates' => 0.92,
                'sands' => 0.46,
                'masons' => 1,
                'workers' => 8,
                'fuel' => 2,
                'machine_drivers' => 0.5,
            ]
        ];

        foreach($cement_concreteworks as $cement_concretework){
            DB::table('cement_concretingworks')->insert($cement_concretework);
        }
    }
}
