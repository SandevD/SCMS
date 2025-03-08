<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Test User',
                'email' => 'test@example.com',
                'email_verified_at' => '2025-03-08 21:46:53',
                'password' => '$2y$12$OzjvZO40VJHZTIrQnbGCa.ziDGHmhhPsB.1IDVNyP3tcnvnpZDJzu',
                'remember_token' => 'po0dq2HaNV',
                'created_at' => '2025-03-08 21:46:54',
                'updated_at' => '2025-03-08 21:46:54',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Sandev Dullewa',
                'email' => 'sandev.net@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$m8T6.D6RpDGHKYZ7IqEjcOoOCMjDpIjD9eiCUaSjIOb0JRqy07AMe',
                'remember_token' => NULL,
                'created_at' => '2025-03-08 21:48:57',
                'updated_at' => '2025-03-08 21:48:57',
            ),
        ));
        
        
    }
}