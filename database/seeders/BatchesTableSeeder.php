<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BatchesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('batches')->delete();
        
        \DB::table('batches')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'KU Top Up',
                'from_year' => '2025',
                'to_year' => '2028',
                'created_at' => '2025-03-16 12:51:11',
                'updated_at' => '2025-03-16 12:51:11',
            ),
        ));
        
        
    }
}