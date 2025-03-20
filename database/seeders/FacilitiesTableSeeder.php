<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FacilitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('facilities')->delete();
        
        \DB::table('facilities')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Computer Lab 1',
                'created_at' => '2025-03-20 12:48:54',
                'updated_at' => '2025-03-20 12:48:54',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Student Lounge',
                'created_at' => '2025-03-20 12:49:06',
                'updated_at' => '2025-03-20 12:49:06',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Meeting Room 1',
                'created_at' => '2025-03-20 12:49:14',
                'updated_at' => '2025-03-20 12:49:14',
            ),
        ));
        
        
    }
}