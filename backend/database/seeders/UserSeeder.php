<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        for($i = 0; $i<50;$i++) {
            User::create([
                'name'=> $faker->sentence(),
                'surname'=>$faker->name(),
                'email'=>$faker->email()
            ]);
        };
    }
}
