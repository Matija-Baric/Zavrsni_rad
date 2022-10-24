<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(5)->create();

        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'matija.baric1@gmail.com',
            'password' => '17102000'
        ]);

        /* Listing::factory()->create([
            [
                'brand' => 'Audi', 
                'tags' => 'Limousine, 4-doors, black',
                'model' => 'A4 2012',
                'location' => 'Osijek',
                'email' => 'matija.baric1@gmail.com',
                'price' => '50',
                'description' => 'Audi.................'
              ],

              [
                'brand' => 'VW', 
                'tags' => 'SUV, 5-doors, white',
                'model' => 'Tiguan',
                'location' => 'Osijek',
                'email' => 'matija.baric1@gmail.com',
                'price' => '50',
                'description' => 'VW.................'
              ]
        ]); */

        Listing::create([
            'brand' => 'VW', 
                'tags' => 'SUV, 5-doors, white',
                'user_id'=> $user->id,
                'model' => 'Tiguan',
                'location' => 'Osijek',
                'email' => 'matija.baric1@gmail.com',
                'price' => '50',
                'description' => 'VW.................'
        ]);
        /* Listing::factory()->create([
            'user_id'=> $user->id
        ]); */
        

    }
}
