<?php

namespace Database\Seeders;

use App\Models\CostType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CostTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $costtypes = [
            [
                'name' => 'Labour Cost'
            ],
            [
                'name' => 'Material Cost'
            ],
            [
                'name' => 'Material + Labour Cost'
            ]
        ];
        foreach($costtypes as $costtype){
            CostType::insert($costtype);
            // DB::table('mixed_types')->insert($mixed_type);
        }
    }
}
