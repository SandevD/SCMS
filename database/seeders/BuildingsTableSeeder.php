<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BuildingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('buildings')->delete();
        
        \DB::table('buildings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Block A',
                'created_at' => '2025-03-16 12:14:41',
                'updated_at' => '2025-03-16 12:14:41',
            ),
        ));
        
        
    }
}