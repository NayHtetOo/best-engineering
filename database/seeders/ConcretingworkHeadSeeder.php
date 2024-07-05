<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConcretingworkHeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $concretingwork_heads = [
            // 1:2:4 ratio type
            [
                'site_id' => 1,
                'ratio_type_id' => 4,
                'mixed_type_id' => 1, // hand
                'length' => 10,
                'width' => 10,
                'height' => 1,
                'qty' => 1,
                'cements' => 18.48,
                'aggregates' => 0.92,
                'sands' => 0.46,
                'masons' => 1,
                'workers' => 10,

                'cement_rate' => 1,
                'aggregate_rate' => 1,
                'sand_rate' => 1,
                'mason_rate' => 1,
                'worker_rate' => 1,
                'labour_costs' => 1,
                'material_costs' => 1,

            ],
            [
                'site_id' => 1,
                'ratio_type_id' => 4,
                'mixed_type_id' => 2, // machine
                'length' => 10,
                'width' => 10,
                'height' => 1,
                'qty' => 1,
                'cements' => 18.48,
                'aggregates' => 0.92,
                'sands' => 0.46,
                'masons' => 1,
                'workers' => 8,
                'fuel' => 2,
                'machine_drivers' => 0.5,

                'cement_rate' => 1,
                'aggregate_rate' => 1,
                'sand_rate' => 1,
                'fuel_rate' => 1,
                'mason_rate' => 1,
                'worker_rate' => 1,
                'machine_driver_rate' => 1,
                'labour_costs' => 1,
                'material_costs' => 1,
            ],
            // 1:3:6 ratio type
            [
                'site_id' => 1,
                'ratio_type_id' => 5,
                'mixed_type_id' => 1, // hand
                'length' => 10,
                'width' => 10,
                'height' => 1,
                'qty' => 1,
                'cements' => 12.86,
                'aggregates' => 0.96,
                'sands' => 0.48,
                'masons' => 1,
                'workers' => 8,

                'cement_rate' => 1,
                'aggregate_rate' => 1,
                'sand_rate' => 1,
                'mason_rate' => 1,
                'worker_rate' => 1,
                'labour_costs' => 1,
                'material_costs' => 1,
            ],
            [
                'site_id' => 1,
                'ratio_type_id' => 5,
                'mixed_type_id' => 2, // machine
                'length' => 10,
                'width' => 10,
                'height' => 1,
                'qty' => 1,
                'cements' => 12.86,
                'aggregates' => 0.96,
                'sands' => 0.48,
                'masons' => 1,
                'workers' => 6,
                'fuel' => 2,
                'machine_drivers' => 0.5,

                'cement_rate' => 1,
                'aggregate_rate' => 1,
                'sand_rate' => 1,
                'fuel_rate' => 1,
                'mason_rate' => 1,
                'worker_rate' => 1,
                'machine_driver_rate' => 1,
                'labour_costs' => 1,
                'material_costs' => 1,
            ]
        ];
        foreach($concretingwork_heads as $concretingwork_head){
            DB::table('concretingwork_heads')->insert($concretingwork_head);
        }
    }
}
