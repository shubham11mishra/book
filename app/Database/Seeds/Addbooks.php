<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Addbooks extends Seeder
{
    public function run()
    {
        $faker  =  \Faker\Factory::create();
        $data = [
            'title' => $faker->word(),
            'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
            'author' => $faker->word(),
            'price' => $faker->numberBetween($min = 100, $max = 1000)
        ];
    }
}
