<?php

use Illuminate\Database\Seeder;

class DepartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Depart::class,13)->create();
    }
}
