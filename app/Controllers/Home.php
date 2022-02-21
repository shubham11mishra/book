<?php

namespace App\Controllers;

use CodeIgniter\Faker;

class Home extends BaseController
{
    public function index()
    {
        // $faker = service('faker');
        // // generate data by calling methods
        // echo $faker->name();
        // // 'Vince Sporer'
        // echo $faker->email();
        // return view('welcome_message');
        // $client = new \GuzzleHttp\Client();
        // $response =  $client->request("GET", "http://jsonplaceholder.typicode.com/todos");
        // var_dump((string) $response->getBody());
        return view('tasks/new');
      
    }
}
