<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CostTiersSeeder::class);
        $this->call(InventoryTableSeeder::class);
        $this->call(QuoteStatusTableSeeder::class);
        $this->call(QuoteRequestsTableSeeder::class);
        $this->call(QuoteLineItemsTableSeeder::class);
    }
}
