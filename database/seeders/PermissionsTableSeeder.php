<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'view-any Announcement',
                'guard_name' => 'web',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'view-any Announcement',
                'guard_name' => 'api',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'view Announcement',
                'guard_name' => 'web',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'view Announcement',
                'guard_name' => 'api',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'create Announcement',
                'guard_name' => 'web',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'create Announcement',
                'guard_name' => 'api',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'update Announcement',
                'guard_name' => 'web',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'update Announcement',
                'guard_name' => 'api',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'delete Announcement',
                'guard_name' => 'web',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'delete Announcement',
                'guard_name' => 'api',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'delete-any Announcement',
                'guard_name' => 'web',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'delete-any Announcement',
                'guard_name' => 'api',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'replicate Announcement',
                'guard_name' => 'web',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'replicate Announcement',
                'guard_name' => 'api',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'restore Announcement',
                'guard_name' => 'web',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'restore Announcement',
                'guard_name' => 'api',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'restore-any Announcement',
                'guard_name' => 'web',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'restore-any Announcement',
                'guard_name' => 'api',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'reorder Announcement',
                'guard_name' => 'web',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'reorder Announcement',
                'guard_name' => 'api',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'force-delete Announcement',
                'guard_name' => 'web',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'force-delete Announcement',
                'guard_name' => 'api',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'force-delete-any Announcement',
                'guard_name' => 'web',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'force-delete-any Announcement',
                'guard_name' => 'api',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'view-any User',
                'guard_name' => 'web',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'view-any User',
                'guard_name' => 'api',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'view User',
                'guard_name' => 'web',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'view User',
                'guard_name' => 'api',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'create User',
                'guard_name' => 'web',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'create User',
                'guard_name' => 'api',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'update User',
                'guard_name' => 'web',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'update User',
                'guard_name' => 'api',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            32 => 
            array (
                'id' => 33,
                'name' => 'delete User',
                'guard_name' => 'web',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            33 => 
            array (
                'id' => 34,
                'name' => 'delete User',
                'guard_name' => 'api',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            34 => 
            array (
                'id' => 35,
                'name' => 'delete-any User',
                'guard_name' => 'web',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            35 => 
            array (
                'id' => 36,
                'name' => 'delete-any User',
                'guard_name' => 'api',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            36 => 
            array (
                'id' => 37,
                'name' => 'replicate User',
                'guard_name' => 'web',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            37 => 
            array (
                'id' => 38,
                'name' => 'replicate User',
                'guard_name' => 'api',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            38 => 
            array (
                'id' => 39,
                'name' => 'restore User',
                'guard_name' => 'web',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            39 => 
            array (
                'id' => 40,
                'name' => 'restore User',
                'guard_name' => 'api',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            40 => 
            array (
                'id' => 41,
                'name' => 'restore-any User',
                'guard_name' => 'web',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            41 => 
            array (
                'id' => 42,
                'name' => 'restore-any User',
                'guard_name' => 'api',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            42 => 
            array (
                'id' => 43,
                'name' => 'reorder User',
                'guard_name' => 'web',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            43 => 
            array (
                'id' => 44,
                'name' => 'reorder User',
                'guard_name' => 'api',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            44 => 
            array (
                'id' => 45,
                'name' => 'force-delete User',
                'guard_name' => 'web',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            45 => 
            array (
                'id' => 46,
                'name' => 'force-delete User',
                'guard_name' => 'api',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            46 => 
            array (
                'id' => 47,
                'name' => 'force-delete-any User',
                'guard_name' => 'web',
                'created_at' => '2025-03-09 06:25:06',
                'updated_at' => '2025-03-09 06:25:06',
            ),
            47 => 
            array (
                'id' => 48,
                'name' => 'force-delete-any User',
                'guard_name' => 'api',
                'created_at' => '2025-03-09 06:25:07',
                'updated_at' => '2025-03-09 06:25:07',
            ),
        ));
        
        
    }
}