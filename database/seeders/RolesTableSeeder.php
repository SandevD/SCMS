<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Super Admin',
                'guard_name' => 'web',
                'created_at' => '2024-10-15 05:57:00',
                'updated_at' => '2024-10-15 05:57:00',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Lecturer',
                'guard_name' => 'web',
                'created_at' => '2025-03-19 10:03:58',
                'updated_at' => '2025-03-19 10:03:58',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Student',
                'guard_name' => 'web',
                'created_at' => '2025-03-19 10:04:09',
                'updated_at' => '2025-03-19 10:04:09',
            ),
        ));
        
        
    }
}