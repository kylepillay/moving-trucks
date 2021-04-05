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
                'from_address' => '35 Ferguson Road, Illovo, Sandton, South Africa',
                'to_address' => '535 Delphi Street, Waterkloof Glen, Pretoria, South Africa',
                'requested_date' => 'Wed Apr 14 2021',
                'distance' => '51',
                'identifier' => 'B666-5495',
                'collection_address_description' => '2nd floor',
                'delivery_address_description' => '1st floor',
                'timeslot' => 'Afternoon',
                'date_is_flexible' => 0,
                'use_form' => 0,
                'items_list' => 'Some additional items here',
                'make_additional_stop' => NULL,
                'additional_stop_address' => NULL,
                'collection_or_delivery_stop' => NULL,
                'plastic_covers' => 0,
                'bubble_wrap' => 0,
                'special_instructions' => 'Some special instructions here',
                'price' => NULL,
                'terms' => NULL,
                'volume' => 175622075,
                'status_id' => 1,
                'created_at' => '2021-04-05 03:55:41',
                'updated_at' => '2021-04-05 03:55:41',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 3,
                'from_address' => '348 Rivonia Boulevard, Edenburg, Sandton, South Africa',
                'to_address' => '24 Staib Street, New Doornfontein, Johannesburg, South Africa',
                'requested_date' => 'Thu Apr 15 2021',
                'distance' => '20',
                'identifier' => 'B503-1742',
                'collection_address_description' => '1st floor',
                'delivery_address_description' => '2nd floor',
                'timeslot' => 'Midday',
                'date_is_flexible' => 0,
                'use_form' => 0,
                'items_list' => 'Some additional Items',
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
                'created_at' => '2021-04-05 04:01:23',
                'updated_at' => '2021-04-05 04:01:23',
            ),
        ));
        
        
    }
}