<?php

use Illuminate\Database\Seeder;

class usernameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          factory(\App\username::class, 20)->create();
    }
}
