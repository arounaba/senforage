<?php

use Illuminate\Database\Seeder;

class CompteursTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Compteur::class,10)->create();

    }
}
