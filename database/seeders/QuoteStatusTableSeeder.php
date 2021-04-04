<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class QuoteStatusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('quote_status')->delete();
        
        \DB::table('quote_status')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Pending',
                'action_label' => 'View',
                'color' => 'text-red-500',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Confirmed',
                'action_label' => 'Send',
                'color' => 'text-green-500',
            ),
            2 =>
            array (
                'id' => 3,
                'title' => 'Complete',
                'action_label' => 'Remind',
                'color' => 'text-gray-500'
            ),
        ));
        
        
    }
}