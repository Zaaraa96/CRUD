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
        // $this->call(UsersTableSeeder::class);
        $this->call(userSeeder::class);
        $this->call(hostSeeder::class);
        $this->call(ownerSeeder::class);
        $this->call(serviceSeeder::class);
        $this->call(softwareSeeder::class);
        $this->call(usernameSeeder::class);
    }
}
