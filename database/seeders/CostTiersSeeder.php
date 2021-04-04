<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CostTiers;

class CostTiersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default credentials
        CostTiers::insert([
            [
                'label' => 'Single Item',
                'minimum_charge' => 300,
                'cost_per_km' => 6
            ],
            [
                'label' => 'Small Move',
                'minimum_charge' => 400,
                'cost_per_km' => 8
            ],
            [
                'label' => 'Medium Move',
                'minimum_charge' => 900,
                'cost_per_km' => 10
            ],
            [
                'label' => 'Large Move',
                'minimum_charge' => 1700,
                'cost_per_km' => 15
            ],
            [
                'label' => 'Extra Large Move',
                'minimum_charge' => 3000,
                'cost_per_km' => 20
            ]
        ]);

    }
}
