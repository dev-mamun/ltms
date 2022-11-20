<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;



class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

    }
}
