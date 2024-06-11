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
                'workers' => 10
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
                'machine_drivers' => 0.5
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
                'workers' => 8
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
            ]
        ];
        foreach($concretingwork_heads as $concretingwork_head){
            DB::table('concretingwork_heads')->insert($concretingwork_head);
        }
    }
}
