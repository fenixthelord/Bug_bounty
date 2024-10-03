<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ResearcherSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('researchers')->insert([
                'uuid' => Str::uuid(),
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'), // You might want to change this
                'phone' => $faker->phoneNumber,
                'code' => $faker->unique()->numberBetween(1000, 9999),
                'image' => $faker->imageUrl(200, 200, 'people'),
                'points' => $faker->numberBetween(0, 1000),
                'facebook' => $faker->url,
                'linkedin' => $faker->url,
                'github' => 'https://github.com/' . $faker->userName,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}