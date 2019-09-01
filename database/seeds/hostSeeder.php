<?php

use Illuminate\Database\Seeder;

class hostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\host::class, 10)->create();
    }
}
