<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('events')->delete();
        
        \DB::table('events')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Google Developer Event',
                'date' => '2025-03-27 00:00:00',
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'status' => 1,
                'created_at' => '2025-03-17 20:05:15',
                'updated_at' => '2025-03-17 20:05:15',
            ),
        ));
        
        
    }
}