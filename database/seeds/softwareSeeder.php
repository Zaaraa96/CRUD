<?php

use Illuminate\Database\Seeder;

class softwareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          factory(\App\software::class, 20)->create();
    }
}
