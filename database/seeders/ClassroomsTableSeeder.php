<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClassroomsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('classrooms')->delete();
        
        \DB::table('classrooms')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '1 - A',
                'building_id' => 1,
                'created_at' => '2025-03-16 12:15:03',
                'updated_at' => '2025-03-16 12:15:03',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '1 - B',
                'building_id' => 1,
                'created_at' => '2025-03-16 12:15:17',
                'updated_at' => '2025-03-16 12:15:17',
            ),
        ));
        
        
    }
}