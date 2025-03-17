<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WorkshopsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('workshops')->delete();
        
        \DB::table('workshops')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'React Native for Beginners',
                'date' => '2025-03-24 00:00:00',
                'start_time' => '10:00:00',
                'end_time' => '12:00:00',
                'status' => 1,
                'created_at' => '2025-03-17 20:03:37',
                'updated_at' => '2025-03-17 20:03:37',
            ),
        ));
        
        
    }
}