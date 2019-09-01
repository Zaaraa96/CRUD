<?php

use Illuminate\Database\Seeder;

class ownerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\owner::class, 20)->create();
    }
}
