<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrickworkHeadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brickwork_heads = [
            // 4" thickness
            [
                'site_id' => 1,
                'thickness_type_id' => 1, // 4" thickness type id
                'ratio_type_id' => 2,
                'length' => 10,
                // 'width' => 10, // no need for 4" thickness type
                'height' => 10,
                'qty' => 1,
                'bricks' => 550,
                'cements' => 2.65,
                'sands' => 0.1,
                'xmet' => 115,
                'masons' => 2,
                'workers' => 3,

                'brick_rate' => 1,
                'cement_rate' => 1,
                'sand_rate' => 1,
                'xmet_rate' => 1,
                'mason_rate' => 1,
                'worker_rate' => 1,
                'labour_costs' => 1,
                'material_costs' => 1,
            ],
            // 9" thickness
            [
                'site_id' => 1,
                'thickness_type_id' => 2, // 9" thickness type id
                'ratio_type_id' => 1, // 1:2
                'length' => 10,
                'width' => 10,
                'height' => 1,
                'qty' => 1,
                'bricks' => 1350,
                'cements' => 9.24,
                'sands' => 0.23,
                'masons' => 4,
                'workers' => 6,

                'brick_rate' => 1,
                'cement_rate' => 1,
                'sand_rate' => 1,
                'xmet_rate' => 1,
                'mason_rate' => 1,
                'worker_rate' => 1,
                'labour_costs' => 1,
                'material_costs' => 1,

            ],
            [
                'site_id' => 1,
                'thickness_type_id' => 2, // 9" thickness type id
                'ratio_type_id' => 2, // 1:3
                'length' => 10,
                'width' => 10,
                'height' => 1,
                'qty' => 1,
                'bricks' => 1350,
                'cements' => 6.96,
                'sands' => 0.26,
                'masons' => 4,
                'workers' => 6,

                'brick_rate' => 1,
                'cement_rate' => 1,
                'sand_rate' => 1,
                'xmet_rate' => 1,
                'mason_rate' => 1,
                'worker_rate' => 1,
                'labour_costs' => 1,
                'material_costs' => 1,
            ],
            [
                'site_id' => 1,
                'thickness_type_id' => 2, // 9" thickness type id
                'ratio_type_id' => 3, // 1:4
                'length' => 10,
                'width' => 10,
                'height' => 1,
                'qty' => 1,
                'bricks' => 1350,
                'cements' => 5.63,
                'sands' => 0.28,
                'masons' => 4,
                'workers' => 6,

                'brick_rate' => 1,
                'cement_rate' => 1,
                'sand_rate' => 1,
                'xmet_rate' => 1,
                'mason_rate' => 1,
                'worker_rate' => 1,
                'labour_costs' => 1,
                'material_costs' => 1,
            ]
        ];
        foreach($brickwork_heads as $brickwork_head){
            DB::table('brickwork_heads')->insert($brickwork_head);
        }
    }
}
