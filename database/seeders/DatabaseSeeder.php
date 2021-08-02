<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
      // \App\Models\proyectos::factory(100)->create();
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class); 
    }
}
