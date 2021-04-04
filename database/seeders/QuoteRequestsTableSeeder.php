<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QuoteRequestsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('quote_requests')->delete();
        
        \DB::table('quote_requests')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 2,
                'from_address' => '24 Staib Street, New Doornfontein, Johannesburg, South Africa',
                'to_address' => '354 Albert Road, Woodstock, Cape Town, South Africa',
                'requested_date' => 'Wed Apr 14 2021',
                'distance' => '1398',
                'identifier' => 'B-558-8253',
                'collection_address_description' => '1st floor',
                'delivery_address_description' => '2nd floor',
                'timeslot' => 'Afternoon',
                'date_is_flexible' => 0,
                'use_form' => 0,
                'items_list' => 'Some additional items',
                'make_additional_stop' => NULL,
                'additional_stop_address' => NULL,
                'collection_or_delivery_stop' => NULL,
                'plastic_covers' => 0,
                'bubble_wrap' => 0,
                'special_instructions' => 'Some special instructions',
                'price' => NULL,
                'terms' => NULL,
                'volume' => 175622075,
                'status_id' => 1,
                'created_at' => '2021-04-04 12:16:20',
                'updated_at' => '2021-04-04 12:16:20',
            ),
        ));
        
        
    }
}