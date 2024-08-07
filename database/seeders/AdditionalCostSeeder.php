<?php

namespace Database\Seeders;

use App\Models\AdditionalCost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdditionalCostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $additional_costs = [
            [
                'site_id' => 1,
                'name' => 'Transportation Charges (3%)',
                'amount' => 1000.0,
            ],
            [
                'site_id' => 1,
                'name' => 'Contingency (5%)',
                'amount' => 1000.0,
            ],
            [
                'site_id' => 1,
                'name' => 'Supervision & Overhead Charges (5%)',
                'amount' => 1000.0,
            ],
        ];
        foreach($additional_costs as $additional_cost){
            AdditionalCost::create($additional_cost);
        }
    }
}
