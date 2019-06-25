<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(UploadTableSeeder::class);
        $this->call(ClaimTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
    }
}

