<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;


class Addbooks extends Seeder
{
    private $faker;

    public function __construct()
    {
        $this->faker =   \Faker\Factory::create();
    }


    public function run()
    {
        $model = new \App\Models\BooksModel();

        for ($i = 0; $i < 100; $i++) {
            $data = $this->fakebooks();

            $model->insert($data);
        }
    }


    private function fakebooks()
    {
        $data = [
            'title' => $this->faker->word(),
            'description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'author' => $this->faker->word(),
            'price' => $this->faker->numberBetween($min = 100, $max = 1000)
        ];
        return $data;
    }
}
