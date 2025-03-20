<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RoleHasPermissionsTableSeeder::class);
        $this->call(ModelHasRolesTableSeeder::class);
        $this->call(ModelHasPermissionsTableSeeder::class);
        $this->call(BuildingsTableSeeder::class);
        $this->call(ClassroomsTableSeeder::class);
        $this->call(BatchesTableSeeder::class);
        $this->call(WorkshopsTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(FacilitiesTableSeeder::class);
    }
}
